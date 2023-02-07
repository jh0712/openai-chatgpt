# use PHP connection with openAI chatgpt
[ChatGPT](https://openai.com/blog/chatgpt/)
- 我是一名PHP工程師，聽聞chatGPT的程式碼生成能力很厲害，所以有了這個專案。
- 主要目的在於
	1. 測試目前chatGPT能夠協作軟體工程到甚麼程度
	2. 測試chatGPT的語意分析狀況
	3. 測試chatGPT在代碼生成的能力
	4. 了解chatGPT能夠給我帶來什麼樣的幫助
- 這個專案的code 有九成是chatGPT所產生的，而我只是在一旁觀看，等待，並藉由自身的經驗去調整一些細節。
- 調整的地方如:
	- chatGPT的connection version
		- 在初始代碼中chat GPT所產生的code中，連線方式為text-davinci-002
		- 而我手動調整成text-davinci-003
	- chatGPT所產生的程式碼中，會有一些小小的bug，或是因為所問的問題定義不夠清楚，而沒有產生完整的代碼。ex 在原生php中，使用compser套件的情況下，沒有引入composer 的autoload.php
```php
require_once __DIR__ . '/vendor/autoload.php';
```

>備註：
>chatGPT 跟open-AI所開放的api text-davinci-003為兩者不同的東西，經過測試之後chatGPT的語意理解能力以及產出的內容很明顯優於text-davinci-003。

## 使用chatGPT代碼生成的提問過程:
--- 
1. 請基於php寫一個與chatGPT連線的程式，需要有html跟css，告訴我需要創建的檔案名稱。 代碼中要使用env的方式讀取api key。 先產出index.php
2. 幫我將這個index.php拆成兩個檔案
3. 將form.php改寫成用ajax的方式連接chatGPT.php
4. 將form.php中的js寫成另一個檔案引入到form.php中
5. 在form.php中加入css，用引入的方式呈現
6. 重新產生style.css的內容
	- 在step5時，因為網路連線問題而導致style.css無法完全產出
7. 在form.php中加入boostrap，在style.css中利用boostrap優化style.css的程式
8. 產生完整一點的style.css，需要有rwd
	- 會出現html class 與style.css 中class對應不上的問題
9. 在script.js加入特效功能
	- 會出現html class 與script.js 中class對應不上的問題
10. 重新產生chatGPT.php的程式碼
11. chatGPT.php中use OpenAI\\Client; 的代碼來源跟安裝方法
12. 將chatGPT.php改為url連線方式
13. 將chatGPT.php加上php debug mode
14. 在chatGPT.php中，需要判斷post method value，post的key值為text，延續目前url的連線方式。
15. chatGPT.php中的getenv('OPENAI_API_KEY')讀取不到，需要在完善這個chatGPT.php

## 結論
---
1. 目前ChatGPT能夠與人類產生有意義的對話--可以理解，並給予相對應的回應
2. 在程式協作方面，chatGPT可以依據使用者的問題給予適當的解決方式
3. 在程式協作方面，chatGPT使一個很好的助手、提問機，但在細節的把控以及回應上，會依照問題者的問題精確程度而有很大的不同
4. 與工程師的協作上，適合:
	- 產生新的點子(缺乏靈感時可以上來詢問)
	- 尋找既有的演算法解決途徑
	- 在入門學習新的知識
		- 可以藉由詢問相關技術內容讓chatGPT提供一個總結或是學習文件
	- 尋找2021年以前的bug解決方式，並讓他提供解決方案
--- 
## 個人觀點
隨著chatGPT的問世，個人的觀點有以下
>(目前chatGPT所產生的內容，依然會有些許的小錯誤，但這並不影響它成為一個很好的協作工具。)
- chatGPT是一個很好的協作工具
- 可以用它來完成以下事項(以下事項為列舉，當然還有其他許多應用)
	- 激發靈感
	- 統整一大段文章
	- 入門新的知識
	- 撰寫文案
	- 文章翻譯
	- 語法糾錯
	- 程式-尋找解決方案
- 隨著個人能力的上限，ChatGPT的上限也將有所提高。
- 將chatGPT結合其他AI(語音、圖像生成等等)會有更多好玩的應用。
