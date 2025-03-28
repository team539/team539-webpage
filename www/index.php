<?php
header("Content-type: text/html; charset=utf-8");
$rootdir="/home/hig/.webroot/";
require_once($rootdir."commonconfig4.php");
require_once("config.php");
$ta=false;
$title="$jcourse | 学習サポート hig3.net";
$ta=preg_match('/\/ta\//',dirname($_SERVER["SCRIPT_NAME"]));
if($ta){
    $ctpath="ta";
} else {
    $ctpath="course";
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="https://www.data.math.ryukoku.ac.jp/img/539-icon.png" type="image/png" />
	<meta http-equiv="content-style-type" content="text/css" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<link rel="stylesheet" href="import.css" type="text/css" />
	<link rel="alternate" type="application/rss+xml" title="樋口三郎の授業情報@龍谷大学先端理工学部数理・情報科学課程 RSS" href="//hig3r.hatenadiary.com/feed"/>
	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- OG -->
	<meta property="og:locale" content="ja_JP"/>
	<meta property="og:type" content="article"/>
	<meta property="og:title" content="Team539 aka 樋口研究室 | 学習サポート hig3.net"/>
	<meta property="og:image" content="https://www.data.math.ryukoku.ac.jp/img/539-icon.png"/>
	<meta property="og:description" content="龍谷大学 先端理工学部 数理・情報科学課程 樋口研究室の数理情報演習・特別研究(学部卒業研究)・大学院"/>
	<meta property="og:url" content="https://www.data.math.ryukoku.ac.jp/course/team_539/"/>
	<meta property="og:site_name" content="学習サポート hig3.net"/>
	<title><?= "$jcourse" ?>| 授業サポート hig3.net</title>
    </head>
    <body>

	<nav class="navbar navbar-expand navbar-light bg-light">
	    <a href="https://hig3.net" class="navbar-brand">hig3.net</a>
	    <ul class="nav navbar-nav">
		<li class="nav-item"><a href="https://www.data.math.ryukoku.ac.jp/contact.php" class="nav-link">連絡・アクセス</a></li>
		<li class="nav-item"><a href="https://www.data.math.ryukoku.ac.jp/contact.php" class="nav-link">時間割</a>    </li>
		<li class="nav-item">
		    <div class="dropdown">
			<a href="/course/" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" >授業</a>
			<div class="dropdown-menu">
			    <?php
			    foreach($othercourses as $c => $ln){
				echo "<a href=\"/course/$c\" class=\"dropdown-item\">$ln</a>\n";                       
			    }
			    ?>
			</div>
		    </div>
		</li>
		<li class="nav-item">    <a href="https://hig3r.hatenadiary.com" class="nav-link">最新情報</a></li>

		<li class="nav-item"><a href="https://moodle.hig3.net/moodle" class="nav-link">Moodle</a></li>
		<li class="nav-item"><a href="https://www.youtube.com/channel/UCEI1Ow3mj4SPTeVSRsXNqkg" class="nav-link">YouTube</a></li>
	    </ul>
	</nav>

	<div class="p-5 mb-4 bg-light rounded-3 text-center"
	     style="background:url(/img/CAS1018_tartan_tile.png);   background-repeat:repeat;">
	    <div class="container-fluid py-5">
		<h1>学習サポート hig3.net</h1>
	    </div>
	</div>
	<nav>
	    <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="https://www.ryukoku.ac.jp">龍谷大学</a></li>
		<li class="breadcrumb-item"><a href="https://www.rikou.ryukoku.ac.jp">先端理工学部</a></li>
		<li class="breadcrumb-item"><a href="https://www.math.ryukoku.ac.jp/">数理・情報科学課程</a></li>
		<li class="breadcrumb-item"><a href="https://www.data.math.ryukoku.ac.jp/">樋口</a></li>
		<li class="breadcrumb-item"><a href="https://www.data.math.ryukoku.ac.jp/course">担当科目</a></li>
		<li class="breadcrumb-item dropdown">
		    <a href="/course/$course" class="dropdown-toggle" data-bs-toggle="dropdown" ><?= $jcourse ?></a>
		    <div class="dropdown-menu">
			<?php
			foreach($othercourses as $c => $ln){
			    echo "<a href=\"/course/$c\" class=\"dropdown-item\">$ln</a>\n";                       
			}
			?>
		    </div>

		</li>
	    </ol>
	</nav>

	<div class="container-fluid">
	    <div><h2 class="page-header"><?= "$jcourse($ayear)" ?></h2>
	    </div>

	    <div class="row">
		<div class="col-12">
		    <ul class="nav nav-tabs" id="myTab">
			<li class="nav-item"><a href="#lab" class="nav-link  " data-bs-toggle="tab">研究室</a></li>
			<li class="nav-item"><a href="#projects" class="nav-link  " data-bs-toggle="tab">プロジェクト</a></li>
			<li class="nav-item"><a href="#sje" class="nav-link" data-bs-toggle="tab">数理情報演習(3年)</a></li>
			<li class="nav-item"><a href="#juniors" class="nav-link" data-bs-toggle="tab">数理情報セミナー(3年 -2021)</a></li>
			<li class="nav-item"><a aria-current="page" href="#seniors" class="nav-link active" data-bs-toggle="tab">特別研究(3,4年)</a></li>
			<li class="nav-item"><a href="#master" class="nav-link" data-bs-toggle="tab">大学院</a></li>
			<?php if($ta): ?>
			    <li class="nav-item"><a href="#ta" class="nav-link" data-toggle="tab">for TA</a></li>
			<?php endif; ?>
		    </ul>
		</div>
	    </div>

	    

	    <div class="tab-content">
		<div class="tab-pane fade show" id="lab">
		    <h3 class="page-header">研究室 Team539</h3>
		    <div class="row" >


			<div class="col-12 order-md-2">    
			    <dl>
				<dt>CTO</dt>
				<dd><a href="/">樋口三郎</a>(<a href="https://www.rikou.ryukoku.ac.jp/">先端理工学部</a>
				    <a href="https://www.math.ryukoku.ac.jp/">数理・情報科学課程</a>) <a href="/access.php">連絡先</a></dd>
				<dt>部屋</dt>
				<dd>学生研究室 瀬田1-539, 教員研究室 瀬田1-507</dd>
				<dt>新歓オプチャ</dt>
				<dd>資料に書いてます. 教員にchatできいてくれてもいいです.</dd>
			    </dl>
			</div>


			<div class="col-12 order-md-1">
			    <h4>最近の研究室情報</h4>
			    <?php if(@$_GET["norss"]!=1 ):      ?>
				<?php echo getmyrss($rsskw,8,"https://hig3r.hatenadiary.com/rss");// feed is ATOM ?>
			    <?php endif; ?>    
			</div>


		    </div>


		</div>

		<div class="tab-pane fade show" id="projects">
		    <h3 class="page-header">プロジェクト</h3>
		    <div class="row" >
			<div class="col-12 order-md-2">    
			    <ul>
				<li>LMS Bot連携</li>
				<li>Collaboration Bot</li>
				<li>数式自動採点</li>
				<li>線形代数学習支援システム</li>
				<!--  
				     <li>演習支援システム</li> 
				-->
				<li>VRで数学</li>
				<li>学習・教育データ分析</li>
			    </ul>
			</div>


			<div class="col-12 order-md-1">
			    <h4>最近の研究室情報</h4>
			    <?php if(@$_GET["norss"]!=1 ):      ?>
				<?php echo getmyrss($rsskw,8,"https://hig3r.hatenadiary.com/rss");// feed is ATOM ?>
			    <?php endif; ?>    
			</div>


		    </div>


		</div>


		<div class="tab-pane fade show" id="sje">
		    <div class="row">

			<div class="col-12 order-md-2">
			    <h3 class="page-header">数理情報演習</h3>
			    <h4>Web/ChatGPTプログラミングwith Python他</h4>
			    <p>Webブラウザやアプリを開くと, その向こうにはWebが広がっています. その Webは誰かがプログラムしています.</p>

			    <a href="handout-hig-juniors_2025.pdf">テーマ選択資料</a>(2025年度)
			    <ul>

				<li>Document Object Model - HTML, CSS
				    <ul>
					<li>Webで文書の意味と視覚表現がどのように組み立てられるかわかります.
					</li>
				    </ul>
				</li>
				<li>サーバサイド, サーバクライアントモデル, HTTP, Webアプリケーション -- Flask, Python
				    <ul>
					<li>Twitter や YouTube もWebアプリ. ユーザの入力を受け取り, ユーザにページとして出力する, Webアプリを作ります.
					</li>
				    </ul>

				</li>
				<li>チャットボット, SNS, Web API -- LINE Messaging API
				    <ul>
					<li>LINEやTwitterのチャットボットはWebと同じ技術で作られてます. 自動的に応答する bot を作ります.</li>
				    </ul>
				</li>
				<li>LLM, ChatGPT, OpenAI API
					<ul>
					<li>ChatGPTは大規模言語モデル(LLM)を使ったサービスです．OpenAIのAPIを使って，botがより自然に会話できるようにします．さらにWebアプリと統合します．</li>
					</ul>
				</li>
			</ul>

			    
			</div>

			<div class="col-12 order-md-1">
			    <?php echo getmyrss($rsskw,4,"https://hig3r.hatenadiary.com/rss");// feed is ATOM ?>
			</div>

		    </div>


		</div>

		<div class="tab-pane fade" id="juniors">
		    <div class="row">
				<div class="col-12">
					<h3 class="page-header">数理情報セミナー(3年, -2021)</h3>
				</div>
		    </div>

		    <div class="col-12">
			<h4>数理情報セミナー(2021)</h4>
			LINE Messaging API / Flask / Python で LINE Bot を制作しました.
			<ul>
			    <li>画像エッジ検出Bot</li>
			    <li>所持金計算bot</li>
			    <li>通学bot</li>
			    <li>ToDoBot</li>
			    <li>電子遅延bot</li>
			    <li>レシピ bot</li>
			    <li>グルメbot</li>
			    <li>人狼 Bot</li>
			</ul>
		    </div>
		    <div class="col-12">
			<h4>数理情報セミナー(2020)</h4>
			LINE bot with LINE Messaging API / Express / Node.js
			<ul>
			    <li> 習慣化確認bot</li>
			    <li> JR西日本遅延情報bot</li>
			    <li> 観光地bot</li>
			    <li> YouTubeの更新をLINEで確認しよう！Bot</li>
			    <li> LINE BOTを用いた持ち物確認BOT</li>
			    <li> LINE給料計算bot</li>
			</ul>
		    </div>


		    <div class="col-12">    
			<h4>数理情報セミナー(2019)</h4>
			LINE bot with LINE Messaging API / Express / Node.js
			<ul>

			    <li>    日記 bot
				気分のアップダウンを察してくれる</li>
			    <li>    朝の情報収集Bot
				命令するとお気に入りのサイトを巡回してくれる</li>
			    <li>    仲介 bot
				元々の名前: マッチングアプリ bot</li>
			    <li>    スケジュール bot
				カレンダーに予定を登録できる</li>
			    <li>    割り勘 bot
				買ったものリストと支払者を入力するとバランスさせてくれる</li>
			    <li>    就活 bot
				興味ある説明会情報が公表されたら通知してくれる</li>
			</ul>
		    </div>
		    
		    <div class="col-12">    
			<h4>数理情報セミナー(2018)</h4>
			LINE bot with LINE Messaging API / PHP
			<ul>
			    <li>瀬田バス時刻表 bot</li>
			    <li>お小遣い帳 bot</li>
			    <li>    ボランティア情報検索 bot</li>
			    <li>   為替相場変換 bot</li>
			    <li>   プロ野球データ bot</li>
			    <li>   バイトシフト調整 bot</li>
			</ul>
		    </div>




		</div>
		<div class="tab-pane fade show active" id="seniors">
		    <div class="row">
			<div class="col-12">
			    <h3>セミナーI(3年)</h3>
			</div>
			<div class="col-12">
			    <a href="handout-hig-seniors_2025.pdf">配属案内</a>(2025)</h4>			
			</div>
			    
			<div class="col-12">
			    <h3>セミナーII・特別研究(4年)</h3>
			</div>

			<div class="col-12">
			<?php $yy=2025; ?>
			    <h4>年間スケジュール(<?=$yy?>)</h4>

			    <ul>

				<li><?=$yy+1?>-03-1? 卒業式</li>
				<li><?=$yy+1?>-02 大学院春季入試</li>
				<li><?=$yy+1?>-02-0? 特別研究発表会</li>
				<li><?=$yy+1?>-01,02 特別研究発表会リハーサル</li>
				<li><?=$yy+1?>-01 特別研究論文提出</li>
				<li><?=$yy?>-12 特別研究論文Beta Version提出・修正</li>
				<li><?=$yy?>-11 研究室内発表＋デモ＋予備評価</li>
				<li><?=$yy?>-09 研究室内発表</li>
				<li><?=$yy?>後期 特別研究II</li>
				<li><?=$yy?>-09 大学院秋季入試</li>
				<li><?=$yy?>-05 大学院推薦入試</li>
				<li><?=$yy?>前期 セミナーII,特別研究I</li>
				<li><?=$yy-1?>後期 セミナーI</li>
				<li><?=$yy-1?>-09 配属希望調査</li>
				<li><?=$yy-1?>-07 履修説明会</li>
			    </ul>
			    
			</div>
			<div class="col-12">
			    <h4>卒業論文(2024)</h4>
			    <ul>
				<li>人間らしい返信速度で返信する会話型LINE Botの開発</li>
				<li>リマインド機能とモチベージョン向上メッセージで習慣化をサポートするLINE Bot開発</li>
				<li>入学予定者の問い合わせに特化したChatbotの開発</li>
				<li>科目のデータと科目間の関連性の情報を提供するシステム</li>
				<li>Moodle Quizの提出時刻及びチェック機能使用履歴のデータ分析と学習行動データに基づく予測モデルの構築</li>
				<li>LINEと生成AIを活用したMoodle長文課題回答支援システムの開発</li>
				<li>指示文で入力した空間図形をAR表示するシステムの開発</li>
				<li>WebAssemblyを使ったWeb上で動作するオセロAIの高速化</li>
			    </ul>
			</div>
			    
			    <div class="col-12">
			    <h4>卒業論文(2023)</h4>
			    <p>配属なし</p>
			</div>
			<div class="col-12">
			    <h4>卒業論文(2022)</h4>
			    <ul>
				<li> 学習しやすいグループワークのグループを作るWebアプリケーションの作成と評価</li>
				<li> <a href="https://www.math.ryukoku.ac.jp/linked-open-data-2eb7dce4.html">Linked Open Dataを用いた多肢選択式問題自動作成システムの開発</a></li>
				<li> 視点トラッキングを用いた遠隔コミュニケーションwebアプリケーションの開発</li>
				<li> WebAR,WebVRを用いたルーレットシステムの開発</li>
				<li> Unityを用いた脱出ゲーム学習システムの開発</li>
				<li> ローカルルールに対応したトランプゲームBotの開発</li>
				<li><a href="https://www.math.ryukoku.ac.jp/manaba-line-bot-0cfd492f.html">manabaの課題を取得・定期通知するLINE Botの開発</a></li>
			    </ul>
			</div>

			<div class="col-12">
			    <h4>卒業論文(2021)</h4>
			    <ul>
				<li><a href="https://www.math.ryukoku.ac.jp/978ff59089524c27b7fb2ebd4a0c5a5e.html">オンデマンド講義に向けたキーワード抽出による動画内容の見出し作成補助システム</a></li>
				<li>LINEを用いたレシート画像での割り勘システムの開発</li>
				<li>Webページの更新をLINEで通知するシステムの開発</li>
				<li>LINEを用いた運動習慣向上システムの開発</li>
				<li>投票ルールを選択できる投票Webアプリケーション</li>
				<li>LINE上で操作を行うペアワークシステムの開発
				    <ul>
					<li><a href="https://www.math.ryukoku.ac.jp/4-2021-59154032.html">教育システム情報学会学生研究発表会, 優秀発表</a></li>
					<li><a href="http://id.nii.ac.jp/1001/00221934/">対面・オンライン授業のペアワークを運営するLINEチャットボット</a></li>
				    </ul>
				</li>
			    </ul>
			    
			</div>

			<div class="col-12">
			    <h4>卒業論文(2020)</h4>
			    <ul>
				<li><a href="https://www.math.ryukoku.ac.jp/line-4b048eea.html">LINE上で操作を行う対話型アンケートツールの開発</a></li>
				<li>LINE上で動作する気温とコーディネート画像を連携させ提示するシステムの開発</li>
				<li><a href="https://www.math.ryukoku.ac.jp/line-953bea19.html">LINE上でグループと個人を仲介するシステム</a></li>
				<li>チャットシステム上で動作するマッチングシステムの開発</li>
				<li>Moodle上で動作する自動採点コンセプトマップQuestion Type
					<ul>
					    <li>Moodleプラグインによる自動採点コンセプトマップ, 教育システム情報学会学生研究発表会，優秀ポスター</a></li>
					    <li>Moodleプラグインによる自動採点コンセプトマップ, <a href="https://www.jsise.org/taikai/2021/program/contents/pdf/SP-03.pdf">教育システム情報学会全国大会</a></li>
					</ul>

				</li>
				<li>Microsoft Teamsを利用した質問予約ができるチャットボットの開発</li>
				<li><a href="https://www.math.ryukoku.ac.jp/microsoft-teams-6951a05f.html">Microsoft Teams内で動作するチャットボットを用いた利用座席管理システムの開発</a></li>
			    </ul>
			    
			</div>

		    </div>

		</div>
		<div class="tab-pane fade" id="master">
		    <div class="row">
			<div class="col-12">
			    <h3>大学院</h3>
			</div>

			<div class="col-12">
			    <h4>発表</h4>
			    <p>だいたい樋口との共同研究なので, <a href="https://researchmap.jp/hig3">researchmap</a> や<a href="https://hig3r.hatenadiary.com/archive/category/Team539">はてなブログ</a>見てください.</p>
			</div>

			<div class="col-12">
			    <h4>最近の修士論文</h4>
			    <ul>
				<li>2023 閲覧履歴の階層的可視化によるWebページ再訪問支援システム</li>

				<li>2022 <a href="https://www.math.ryukoku.ac.jp/c8d76172f92243d0a62c3e96bbf3d0f9.html">講義資料を想定した共同読書注釈システムの開発</a></li>
				<li>2022 TAを支援する質問予約管理システムの開発</li>
				<li>2021 KaTeXでレンダリングされた複数行数式の折り畳みと展開</li>
				<li>2017 学習履歴に基づいて適応的に動作する数学e-learningシステムの研究</li>
			    </ul>
			</div>

			<div class="col-12">
			    <h4>博士論文</h4>
			    <ul>
				<li>2016 モンテカルロ法による多次元状態密度推定の研究</li>
			    </ul>
			</div>


		    </div>
		</div>
		<?php if($ta): ?>
		    <div class="tab-pane fade" id="ta">
			<div class="row">
			    <div class="col-12">
				<h3>for TA</h3>

				<h4>連絡方法</h4>
				Teams

				<h4>資料</h4>
				<ul>
				    <li>学生用ページ
					<?="<a href=\"https://www.data.math.ryukoku.ac.jp/course/${course}_$ayear/\">$ayear</a> " ?>
				    </li>
				    <li>過去のTAページ
					<?= "<a href=\"https://www.data.math.ryukoku.ac.jp/ta/${course}_$ayearm1/\">$ayearm1</a> "?>   
				    </li>
				</ul>

				<h4>TA勤務計画</h4>
				<h4>交代</h4>
				<p>科目のTAでない人に頼む必要があるときは事前に樋口に言ってください. こちらからお願いするまでは代理を探さないでください.</p>


			    </div>
			</div>
		    </div>
		<?php endif; ?>
	    </div>


	    
	    <div class="row page-footer">

		<div class="col-8">    
		    <div>Copyright &copy; <?= $year ?> Saburo Higuchi. All rights reserved.</div>
		    <address>
			<div><a href="/">Saburo Higuchi 樋口三郎</a></div>
			<div><img src="/img/hig_address.png" alt="hig&apos;s mail address"  align="bottom" style="height:2ex;"/></div>
			<div><a href="https://www.data.math.ryukoku.ac.jp/">https://www.data.math.ryukoku.ac.jp/</a></div>
		    </address>
		</div>
		<div class="col-4">    
		    <a href="https://hig3.net"><img src="/img/hig3_qr.png" style="align:center;" alt="QRcode to hig3.net" width="100"/></a>
		</div>
	    </div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script>
	 // deep linking - load tab on refresh
	 let url = location.href.replace(/\/$/, '');
	 if (location.hash) {
	     const hash = url.split('#');
	     const currentTab = document.querySelector('#myTab a[href="#' + hash[1] + '"]');
	     const curTab = new bootstrap.Tab(currentTab);
	     curTab.show();
	     url = location.href.replace(/\/#/, '#');
	     history.replaceState(null, null, url);
	     setTimeout(() => {
		 window.scrollTop = 0;
	     }, 400);
	 }
	 // change url based on selected tab
	 const selectableTabList = [].slice.call(document.querySelectorAll('a[data-bs-toggle="tab"]'));
	 selectableTabList.forEach((selectableTab) => {
	     const selTab = new bootstrap.Tab(selectableTab);
	     selectableTab.addEventListener('click', function () {
		 var newUrl;
		 const hash = selectableTab.getAttribute('href');
		 if (hash == '#home-tab') {
		     newUrl = url.split('#')[0];
		 } else {
		     newUrl = url.split('#')[0] + hash;
		 }
		 history.replaceState(null, null, newUrl);
	     });
	 });
	</script>
    </body>
</html>

