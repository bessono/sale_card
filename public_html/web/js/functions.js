var toPaySumm_WorkForm = 0;
var toPaySummBonus_WorkForm = 0;
var toPaySummPercent_WorkForm = 0;
var backMoney_WorkForm = 0;

function getCalcSumm(sum,percent,bonus,userId){
	console.log("sum="+sum+" percent="+percent+" bonus="+bonus);
	var bonusButton = "";
	var percentButton = "";
	var justPayButton = "";
	var ballance = 0;
	var ballPercent = 0;
	var out = "Будет произведена покупка:На сумму "+sum;
	// amke a bonus pay button
		if((sum >= bonus) && (bonus > 0)){
			ballance = sum - bonus;
			bonusButton = '<div class="col-md-4 m-3"><input type="button" onclick="bonusPayButtonOnLick('+sum+','+ballance+','+userId+')" value="Оплатить бонусами '+bonus+'" class="btn btn-primary"></div> ';
			out += "<br>При оплате бонусами остаток к оплате = "+ballance;
		}
	// make a percent putton
		if(percent > 0 ){
			ballPercent = (sum * percent)/100;
			ballance = sum - ballPercent;
			percentButton = ' <div class="col-md-4 m-3"><input type="button" onclick="percentPayButtonOnLick('+sum+','+ballance+','+userId+')" value="Оплатить используя процент '+percent+'%" class="btn btn-primary"></div> ';
			out += "<br>При оплате со скидкой "+percent+"% к оплате = "+ballance;
		}
	// make a jastPay button
		justPayButton = '<div class="col-md-4 m-3"><input type="button" onclick="justPayButtonOnLick('+sum+','+userId+');" value="Не использовать скидку (провести покупку)" class="btn btn-warning"></div>';
	// out buttons
	jQuery('#button_container').html(out+"<br><div class='container'>"+bonusButton+percentButton+justPayButton+"</div>");
	// Serialize summs 
	toPaySumm_WorkForm = sum;
	toPaySummBonus_WorkForm = bonus;
	toPaySummPercent_WorkForm = ballance;
	jQuery('#customer_cash').val('0');
}

function justPayButtonOnLick(sum,userId){
	console.log('debug justPayButtonOnLick with data: sum='+sum+' userId='+userId);
	getFeedBackSumm(toPaySumm_WorkForm);

}

function percentPayButtonOnLick(sum,percentSumm,userId){
	console.log('debug justPayButtonOnLick with data: sum='+sum+' userId='+userId);
	getFeedBackSumm(toPaySummPercent_WorkForm);

}

function bonusPayButtonOnLick(sum,bonusSumm,userId){
	sum = parseInt(sum);
	toPaySummBonus_WorkForm = parseInt(toPaySummBonus_WorkForm);
	console.log('debug justPayButtonOnLick with data: sum='+sum+' userId='+userId+', bonuses='+toPaySummBonus_WorkForm);
	if(sum <= toPaySummBonus_WorkForm){

	} else {
		var necesery = sum - toPaySummBonus_WorkForm;
		alert('Не хватает бонусов для расчёта нужно накопить ещё'+necesery);
	}

}

function getFeedBackSumm(summToPay){
	customerSum = jQuery('#customer_cash').val();
	customerSum = parseInt(customerSum);
	summ = jQuery('#summ').val();
	summ = parseInt(summ);
	console.log("customerSum="+customerSum+', summ='+summ+', summToPay='+summToPay);
	if(summ >= 0 ){
		if(customerSum > summToPay){
			backMoney_WorkForm = customerSum - summToPay;
			console.log('backMoney_WorkForm='+backMoney_WorkForm);
		}
	} else {
		jQuery('back_money').val('Укажите сумму покупки');
	}
}