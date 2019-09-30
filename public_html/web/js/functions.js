function getCalcSumm(sum,percent,bonus){
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
			bonusButton = ' <input type="button" value="Оплатить бонусами '+bonus+'" class="btn btn-primary"> ';
			out += "<br>При оплате бонусами остаток к оплате = "+ballance;
		}
	// make a percent putton
		if(percent > 0 ){
			ballPercent = (sum * percent)/100;
			ballance = sum - ballPercent;
			percentButton = ' <input type="button" value="Оплатить используя процент '+percent+'%" class="btn btn-primary"> ';
			out += "<br>При оплате со скидкой "+percent+"% к оплате = "+ballance;
		}
	// make a jastPay button
		justPayButton = '<input type="button" value="Не использовать скидку (провести покупку)" class="btn btn-warning">';
	// out buttons
	jQuery('#button_container').html(out+"<br>"+bonusButton+percentButton+justPayButton);
}