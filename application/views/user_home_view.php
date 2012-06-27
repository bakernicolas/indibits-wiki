<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->model("wiki_acc");
if(wiki_acc::isLoggedIn()){
?>
	<div class="btn-group">
		<button class="btn" id="notifications"onclick="switchActive(this);"><i class="icon-exclamation-sign"></i> Notifications</button>
		<button class="btn" id="editors" onclick="switchActive(this);" value="abavafva"><i class="icon-user"></i> Editors</button>
		<button class="btn"id="wikis"onclick="switchActive(this);"><i class="icon-pencil"></i> Wikis</button>
		<button class="btn"id="accounts"onclick="switchActive(this);"><i class="icon-wrench"></i> Manage Accounts</button>
		<a class="btn"id="refresh" href="<? echo $this->config->base_url().index_page()."/user_home";?>"><i class="icon-home"></i> Refresh Dashboard</a>
	</div>
	<style type="text/css">.empty{}</style>
	<script type="text/javascript">
		var aligin;
		function setActive(){
			document.getElementById('notifications').setAttribute('class',' btn active');
			$('#editors_tab').fadeOut(0);
			$('#wikis_tab').fadeOut(0);
			$('#accounts_tab').fadeOut(0);
		}
		function switchActive(button){
			document.getElementById('notifications').setAttribute('class',' btn');
			document.getElementById('editors').setAttribute('class',' btn');
			document.getElementById('wikis').setAttribute('class',' btn');
			document.getElementById('accounts').setAttribute('class',' btn');
			button.setAttribute('class','btn active');
			$('#notifications_tab').fadeOut(0);
			$('#editors_tab').fadeOut(0);
			$('#wikis_tab').fadeOut(0);
			$('#accounts_tab').fadeOut(0);
			$('#'+button.id+"_tab").fadeIn(500);
		}
		setTimeout('setActive();',0);
	</script>
	
	
	
	<div id='notifications_tab'>
		<div class="row-fluid" style="height:80%;overflow-y:scroll;">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
			<?
				foreach($notifications as $row){
					echo "<li><a>".$row['message'].'<em style="font-size:10px;color:gray;"> -'.$row['time']."</em></a></li>";
				}
			?>
			</ul>
			<br><br><br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br><br><br>
		  </div>
		</div>
	</div>
	
	
	
	<div id='editors_tab'>
	<table class="table">
		<tr><th>Editors</th><th>Owners</th></tr>
		<tr><td>
		<div class="row-fluid" style="height:500px;overflow-y:scroll;">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
			<?
				$i=0;
				foreach($editors as $row){
					echo "<li><a href='#'id='owner_".$i."'class='empty'rel='popover' title='".wiki_acc::get_individual_user_data($row['id'],'fullname')."' data-content='<strong>username</strong>: ".$row['username']."<br><strong>number of wikis</strong>: ".wiki_acc::get_individual_user_data($row['id'],'number_of_wikis')."<br><strong>number of edits</strong>: ".wiki_acc::get_individual_user_data($row['id'],'number_of_edits')."<br>' 
					onmouseover='$(\"#\"+this.id).popover(\"show\");'>".$row['first_name'].' '.$row['last_name'].'<em style="font-size:10px;color:gray;"> -since: '.$row['signup_time']."</em></a></li>";
					$i++;
				}
			?>
			</ul>
			<br><br><br><br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br><br><br><br>
		  </div>
		</div>
	  </td><td>
		<div class="row-fluid" style="height:500px;overflow-y:scroll;">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
			<?
				$i=0;
				foreach($owners as $row){
					echo "<li><a href='#'id='owner_".$i."'class='empty'rel='popover' title='".wiki_acc::get_individual_user_data($row['id'],'fullname')."' data-content='<strong>username</strong>: ".$row['username']."<br><strong>number of wikis</strong>: ".wiki_acc::get_individual_user_data($row['id'],'number_of_wikis')."<br><strong>number of edits</strong>: ".wiki_acc::get_individual_user_data($row['id'],'number_of_edits')."<br>' 
					onmouseover='$(\"#\"+this.id).popover(\"show\");'>".$row['first_name'].' '.$row['last_name'].'<em style="font-size:10px;color:gray;"> -since: '.$row['signup_time']."</em></a></li>";
					$i++;
				}
			?>
			</ul>
			<br><br><br><br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br><br><br><br>
		  </div>
		</div>
	  </div>
	  </td></tr>
	  </table>
	</div>
	
	
	
	<div id='wikis_tab'>
	This will have all the wikis and one can edit it
	</div>
	
	
	
	<div id='accounts_tab'>
	This is where owners can create new editor accounts and promote editors to owners
	</div>
<?
}
?>