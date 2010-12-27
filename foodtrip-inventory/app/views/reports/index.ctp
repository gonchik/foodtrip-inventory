<?php 
echo $html->link('seller sales report (today)', array('controller'=>'reports', 'action'=>'seller_sales'));
?>
<br>
<br>
station sales report (today)


<div class="reports form">
<?php echo $this->Form->create('Report', array('action'=>'seller_sales'));?>
	<fieldset>
 		<legend><?php __('Sales Report'); ?></legend>
	<?php
		echo $this->Form->input('Station', 
			array('type'=>'select')
		);
		echo $this->Form->input('User', 
			array('type'=>'select')
		);
		echo $this->Form->input('StartDate', 
			array('type'=>'text', 'id'=>'StartDate')
		);
		echo $this->Form->input('EndDate', 
			array('type'=>'text', 'id'=>'EndDate')
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

<!--<p>Start Date: <input id="startDate" name="data[Report][startDate]" type="text"></p>-->
<!--<p>End Date: <input id="endDate" name="data[Report][endDate]" type="text"></p>-->

<?php 

$this->Js->buffer("
	var startDatePicker = $('#StartDate');
	var endDatePicker = $('#EndDate');

	startDatePicker.datepicker({
		appendText: '(yyyy-mm-dd)',
		dateFormat: 'yy-mm-dd',
		showButtonPanel: true,
		onSelect: function(dateText, inst) { 
			updateLimits(startDatePicker, endDatePicker);
			endDatePicker.datepicker('setDate', getStartDatePlusOneDay());
		}
	}).show();
	endDatePicker.datepicker({
		appendText: '(yyyy-mm-dd)',
		dateFormat: 'yy-mm-dd',
		defaultDate: '+1',
		showButtonPanel: true,
		onSelect: function(dateText, inst) { 
			updateLimits(startDatePicker, endDatePicker);
		}
	}).show();
	
	startDatePicker.datepicker('setDate', new Date());
	endDatePicker.datepicker('setDate', new Date());
	updateLimits();
	
	$('#ReportIndexForm').submit(function(){
		var stationId = $('#ReportStation').val();
		var userId = $('#ReportUser').val();
		if(stationId == '' && userId == '') {
			alert('Specify either a station or a user to generate the report');
			return false;
		}
		return true;
	});
	

	function updateLimits() {
		startDatePicker.datepicker('option', 'maxDate', endDatePicker.datepicker('getDate'));
		endDatePicker.datepicker('option', 'minDate', getStartDatePlusOneDay());
		
		console.log(startDatePicker.datepicker('getDate'));
		console.log(endDatePicker.datepicker('getDate'));
	}
	
	function getStartDatePlusOneDay() {
		var minEndDate = startDatePicker.datepicker('getDate', '+1d'); 
  		minEndDate.setDate(minEndDate.getDate()+1); 
  		return minEndDate;
	}
");
?>