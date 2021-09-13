<?php

if(!defined('_INDEX_')) { // index에서만 실행



?>




<div class="position-relative overflow-hidden p-md-5 text-center bg-dark bg-sub-1 ety-mt-main about-bg ">

  <div class="p-5 mx-auto my-5 text-center TextWrap" id="topBanner"  >
	<h2 class="display-4 font-weight-normal" id="subTitleText">

    <?php
        $sql = " select *
              from {$g5['menu_table']}
              where me_use = '1'
                and length(me_code) = '2'
              order by me_order, me_id ";
        $result = sql_query($sql, false);
        $gnb_zindex = 999; // gnb_1dli z-index 값 설정용
        $menu_datas = array();

    for ($i=0; $row=sql_fetch_array($result); $i++) {
          $menu_datas[$i] = $row;
          $sql2 = " select *
                from {$g5['menu_table']}
                where me_use = '1'
                  and length(me_code) = '4'
                  and substring(me_code, 1, 2) = '{$row['me_code']}'
                order by me_order, me_id ";
          $result2 = sql_query($sql2);

          for ($k=0; $row2=sql_fetch_array($result2); $k++) {
            $menu_datas[$i]['sub'][$k] = $row2;
          }
    }
    $i = 0;
    foreach( $menu_datas as $row ){

      $menuClass= explode('?' , $row['me_link']);
      $menuClassId = explode( '=' , $menuClass[1]);

      if( empty($row) ) continue;
    ?>
      <?php if($row['sub']['0']) {// 서브메뉴가 있다면


        ?>

          <p  class='<?php echo $menuClassId[1]; ?>' ><?php echo $row['me_name'] ?></p>
            <!-- 서브 -->

              <?php
              // 하위 분류
              $k = 0;
              foreach( (array) $row['sub'] as $row2 ){

              if( empty($row2) ) continue;

              $menuSubClass= explode('?' , $row2['me_link']);
              $menuSubClassId = explode( '=' , $menuSubClass[1]);

              ?>

             <p class='<?php echo $menuSubClassId[1]; ?>' ><?php echo $row2['me_name'] ?></p>

              <?php
              $k++;
              }   //end foreach $row2
              ?>

      <?php }else{

        ?>

      <p class='<?php echo $menuClassId[1]; ?>'><?php echo $row['me_name'] ?></p>

      <?php }?>


    <?php
    $i++;
    }   //end foreach $row
    ?>

  </h2>
	<p class="ko1 shadow3">
		<?php echo $subTitle?>
	</p>
  </div>
  <div class="product-device shadow-sm d-none d-md-block"></div>
  <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
  <?php

      echo $_menu->viewNav();

  ?>
</div>


<?php } ?>
