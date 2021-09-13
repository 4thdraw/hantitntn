
<nav class="navbar fixed-top navbar-white">
  <?php
  if (!defined('_INDEX_')) {
    ?>
    <div class='container-lg'>
  <?php } ?>

  <div class="row <?php
  if (defined('_INDEX_')) {
    ?> flex-column  align-items-start <?php }else{ ?> align-items-center w-100 <? } ?>" id="hd">
	   <a class="navbar-brand" href="<?php echo G5_URL?>" class="logo"><img src="/img/logo_500_w.png" data-yellow='/img/logo_500.png'></a>
	    <div class="r"  id="gnb"  >
	         <ul class="navbar-nav ml-auto row <?php
           if (defined('_INDEX_')) {
             ?> flex-column  align-items-start <?php }else{ ?> align-items-center flex-row<? } ?>">
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
			if( empty($row) ) continue;
		?>
			<?php if($row['sub']['0']) { ?>
				<li class="nav-item  megamenu-li">
					<a class="nav-link  ks4 <?php
          if (defined('_INDEX_')) {?>
            f20
          <?php }else{ ?> f17 <?php } ?>" href="<?php echo $row['me_link']; ?>"  target="_<?php echo $row['me_target']; ?>">
					<?php echo $row['me_name'] ?>
					</a>
						<!-- 서브 -->
						<ul class="navi_d2">
							<?php
							// 하위 분류
							$k = 0;
							foreach( (array) $row['sub'] as $row2 ){

							if( empty($row2) ) continue;

							?>
              <li>
							<a class=" ks4 f16 fw4" href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"><?php echo $row2['me_name'] ?></a>
</li>
							<?php
							$k++;
							}   //end foreach $row2

							if($k > 0)
							echo '</ul>'.PHP_EOL;
							?>
			<?php }else{?>
				<li class="nav-item">
				<a class="nav-link ks4 f18" href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"><?php echo $row['me_name'] ?></a>
				</li>
			<?php }?>
		</li>

		<?php
		$i++;
		}   //end foreach $row

		if ($i == 0) {  ?>
			<li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
		<?php } ?>
		<li class="nav-item  login">
		  <a class="nav-link " href="#" >
			LOGIN
		  </a>
		  <div class="" >

			<?php if($is_admin) { ?><a class="dropdown-item" href="<?php echo G5_URL?>/adm">관리자</a><?php } ?>
			<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/new.php">새글</a>
			<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/qalist.php">1:1문의</a>
			<?php if($is_member) { ?>
			<a class="dropdown-item" href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a>
			<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/logout.php">로그아웃</a>
			<?php }else{ ?>
			<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/login.php">로그인</a>
			<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/register.php">회원가입</a>
			<?php } ?>
		  </div>
		</li>
	  </ul>
	</div>
  <?php
  if (!defined('_INDEX_')) {?>
    </div>
  <?php } ?>
  </div>





  <!--전체메뉴-->

  <div class="collapse navbar-collapse" id="navbarResponsive"  data-animations="fadeIn">
	  <ul class="navbar-nav ">
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
			if( empty($row) ) continue;
		?>
			<?php if($row['sub']['0']) { ?>
				<li class="nav-item megamenu-li px-4 ">
					<a class="nav-link  ks4 <?php
          if (defined('_INDEX_')) {?>
            f20
          <?php }else{ ?> f16 <?php } ?>" href="<?php echo $row['me_link']; ?>" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" target="_<?php echo $row['me_target']; ?>">
					<?php echo $row['me_name'] ?>
					</a>
						<!-- 서브 -->
						<ul class="dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
							<?php
							// 하위 분류
							$k = 0;
							foreach( (array) $row['sub'] as $row2 ){

							if( empty($row2) ) continue;

							?>
              <li>
							<a class=" ks4 f18 fw4" href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"><?php echo $row2['me_name'] ?></a>
</li>
							<?php
							$k++;
							}   //end foreach $row2

							if($k > 0)
							echo '</ul>'.PHP_EOL;
							?>
			<?php }else{?>
				<li class="nav-item">
				<a class="nav-link ks4 f18" href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"><?php echo $row['me_name'] ?></a>
				</li>
			<?php }?>
		</li>

		<?php
		$i++;
		}   //end foreach $row

		if ($i == 0) {  ?>
			<li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
		<?php } ?>
		<li class="nav-item dropdown login">
		  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			LOGIN
		  </a>
		  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">

			<?php if($is_admin) { ?><a class="dropdown-item" href="<?php echo G5_URL?>/adm">관리자</a><?php } ?>
			<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/new.php">새글</a>
			<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/qalist.php">1:1문의</a>
			<?php if($is_member) { ?>
			<a class="dropdown-item" href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a>
			<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/logout.php">로그아웃</a>
			<?php }else{ ?>
			<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/login.php">로그인</a>
			<a class="dropdown-item" href="<?php echo G5_URL?>/bbs/register.php">회원가입</a>
			<?php } ?>
		  </div>
		</li>
	  </ul>
	</div>

	<button class="navbar-toggler navbar-dark navbar-toggler-right d-block <?php
  if (!defined('_INDEX_')) {?>
    d-md-none
  <?php } ?>" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="true" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon">
      <em>MENU</em>
    </span>
	</button>

  </div>
</nav>
