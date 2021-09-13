<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}


include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');

if($bo_table) {
	$E_bo = sql_fetch("SELECT * FROM han_board where bo_table ='$bo_table'");
}

// 오늘 새글
function bo_count($bo){
	$cnt = 0;
	foreach (func_get_args() as $bo) {
		$table = "g5_write_".$bo;
		$sql = "select count(*) cnt from $table where wr_datetime >= CURRENT_DATE() and wr_is_comment=0";
		$row = sql_fetch($sql);
		$cnt += $row['cnt'];
	}
	return $cnt;;
}

?>


<!-------------------------- 네비게이션 -------------------------->
<?php
if (defined('_INDEX_')) {?>
  <header id="mainBanner">
    <div class="text2">
    <h2>대학병원급<br>
체계적인 치료 시스템 병원</h2>
    <p>관절.척추 전문병원 한티 튼튼정형외과는 보다 질 높은 의료 서비스를<br>
제공하기 위해 대학병원 수준의 전문 진료 센터 와 진료서비스가 함께 하고 있습니다.
</p>
    </div>
<?php }  ?>
<?php
include_once(G5_THEME_PATH.'/navication.php');

if (defined('_INDEX_')) echo "</header>";

?>









<?php
	if($bo_table){
		include_once(G5_THEME_PATH.'/top_banner.php');
	}
?>
