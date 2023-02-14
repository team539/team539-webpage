<?php
function navbar($cur,$tmpnum){

    global $year;
    global $course;
    global $lectname;

    return "<div class=\"navbar\"><a href=\"/~hig/\">樋口三郎</a>&gt; <a href=\"/~hig/course/\">担当科目</a>&gt;
    <a href=\"/~hig/course/#$year\">$year"."年</a>&gt;
    <a href=\"/~hig/course/${course}_${year}/\">$lectname</a>&gt;
    <a href=\"/~hig/course/${course}_${year}/p/$cur\">課題p$tmpnum</a></div>";
}

//function fn1($filename){
//    return "<span class=\"filename\">$filename</span>";
//}


function proj($name){
    return "<a href=\"../$name/\">課題$name</a>";
}

function lect($num,$y=2018){
    return "<a href=\"/~hig/course/compscib_$y/w$num.pdf\">講義L$num</a>";
}

function summary2($cur,$tosubmit,$detail=""){
    global $proj;

    $list="<ul>";
	foreach($tosubmit as $item){
        $list.="<li><span class=\"filename\">".$item[0]."</span>&nbsp;".$item[1]."</li>"; 
	}
	$list.="</ul>";

    return "
    <h2>情報</h2>
    <ul>
	<li>出題:". $proj[$cur]["date"] . "</li>
	<li>実行/提出期限:" . $proj[$cur]["deadline"] . "</li>
	<li>提出 $detail $list </li>
    </ul>";
}


function toolbar($cur,$tmpnum,$ta,$links=TRUE){
    global $title;
    $tmpstr="<h1>$title($cur) - 課題p$tmpnum ";
	if($ta){
        $tmpstr.="<span class=\"ta\">(TA用ページ)</span>";
	}
	$tmpstr.="</h1>";
    if($links){
        $tmpstr.="<div class=\"toolbar\">";
        if( is_readable("src") ){
            $tmpstr.="<a href=\"src\">サンプル</a> ";
        }
        if( is_readable("sols") ){
            $tmpstr.="<a href=\"sols\">解答例</a> ";
        }
        if( $ta && is_readable("solsta") ){
            $tmpstr.="<a href=\"solsta\" class=\"ta\">TA用説明と解説</a>";
        }
        $tmpstr.="</div>";
    }
    return $tmpstr;
}

// Local Variables:
// mode: php
// End:
