<?php
define('SUBMISSIONURL','https://moodle.hig3.net');
$mymoodle="hig3Moodle";
$mymoodleurl="https://moodle.hig3.net";

$othercourses=[ "master"=>"修士特別研究","seniors"=>"特別研究","juniors"=>"数理情報演習", "linalg1"=>"線形代数☆演習I", "probstat1"=>"確率統計I", "cp"=>"数理と社会","projmath"=>"プロジェクト演習"];
$past=range(2023,2022);

$moodle="<a href=\"https://moodle.hig3.net/moodle/\">hig3Moodle</a>";

$course="team539";
$lectname="Team539 aka 樋口研究室";
$jcourse=$lectname;
$ayear=2025;
$ayearm1=$ayear-1;
$grade="4";
$audience="<a href=\"https://www.ryukoku.ac.jp/\">龍谷大学</a> <a href=\"https://www.rikou.ryukoku.ac.jp/\">先端理工学部</a><a href=\"https://sentan.rikou.ryukoku.ac.jp/learn/program/25/\">SDGs P</a>,<a href=\"https://www.math.ryukoku.ac.jp/\">数理・情報科学課程</a>${grade}回生必修";


$rsskw=["Team539","3年生","4年生","大学院","大学院生","発表"];

// 曜日は計算できるはず
$youbi=array("日","月","火","水","木","金","土");
$classstyle=array("E"=>"ex",
		  "L"=>"lect",	
		  "H"=>"holiday",
		  "A"=>"additional",
		  "T"=>"exam",
		  "S"=>"mark");

$examname=[];
/*$examname=array("春のプチテスト(実技)","春のプチテスト(筆記)","初夏のプチテスト(実技)","ファイナルトライアル(筆記)","科目の成績集計");*/
$finalmark=count($examname);			// $nthexam-th exam is total


$hoko="";

$textbook='なし';


$date=[];

$content=array();

$content["L"]=[];





$content["E"]=[
];



$tacontent=array();
$tacontent["L"]=json_decode(<<<END_OF_JSONT
[
{},
{},
{},
{},
{"content":"<a href=\"teamL05.pdf\">チーム課題</a>"}
]
END_OF_JSONT
			   ,true
);



// Local Variables:
// mode: php
// End: