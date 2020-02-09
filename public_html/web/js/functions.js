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
			bonusButton = '<div class="col-md-4 m-3"><input type="button" value="Оплатить бонусами '+bonus+'" class="btn btn-primary"></div> ';
			out += "<br>При оплате бонусами остаток к оплате = "+ballance;
		}
	// make a percent putton
		if(percent > 0 ){
			ballPercent = (sum * percent)/100;
			ballance = sum - ballPercent;
			percentButton = ' <div class="col-md-4 m-3"><input type="button" value="Оплатить используя процент '+percent+'%" class="btn btn-primary"></div> ';
			out += "<br>При оплате со скидкой "+percent+"% к оплате = "+ballance;
		}
	// make a jastPay button
		justPayButton = '<div class="col-md-4 m-3"><input type="button" onclick="justPayButtonOnLick('+sum+','+userId+');" value="Не использовать скидку (провести покупку)" class="btn btn-warning"></div>';
	// out buttons
	jQuery('#button_container').html(out+"<br><div class='container'>"+bonusButton+percentButton+justPayButton+"</div>");
}

function justPayButtonOnLick(sum,userId){
	console.log('debug justPayButtonOnLick with data: sum='+sum+' userId='+userId);
}