$(document).ready(function() {
	
	function listCities(getSelectState, cities, getSelectCity){
		for (var i = 0; i < cities.length; i++){
			var newOptionElement = document.createElement("option");
			getSelectCity.appendChild(newOptionElement);
			var myCity = document.createTextNode(cities[i]);
			newOptionElement.appendChild(myCity);
		}
	}
	
    function citiesDropDown(){
        var getSelectState = document.getElementById("state");
        var getSelectCity = document.getElementById("city");
        getSelectState.onchange = function(){
            if(getSelectState.selectedIndex !== 0){
                getSelectCity.innerHTML = "";
            } else {
                getSelectCity.innerHTML = "<option>استان خود را انتخاب کنید...</option>";
            }
            if(getSelectState.selectedIndex === 1){
                var cities = ["شهر خود را انتخاب کنید...","آذرشهر","اسکو","اهر","بستان‌آباد","بناب","تبریز","جلفا","چاراویماق","سراب","شبستر","عجب‌شیر","کلیبر","مراغه","مرند","ملکان","میانه","ورزقان","هریس","هشترود"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 2){
                var cities = ["شهر خود را انتخاب کنید...","ارومیه","اشنویه","بوکان","پیرانشهر","تکاب","چالدران","خوی","سردشت","سلماس","شاهین‌دژ","ماکو","مهاباد","میاندوآب","نقده"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 3){
                var cities = ["شهر خود را انتخاب کنید...","اردبیل","بیله‌سوار","پارس‌آباد","خلخال","کوثر","گرمی","مشگین شهر","نمین","نیر"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 4){
                var cities = ["شهر خود را انتخاب کنید...","آران و بیدگل","اردستان","اصفهان","برخوردار و میمه","تیران و کرون","چادگان","خمینی‌شهر","خوانسار","سمیرم","شهرضا","سمیرم سفلی","فریدن","فریدون‌شهر","فلاورجان","کاشان","گلپایگان","لنجان","مبارکه","نائین","نجف‌آباد","نطنز"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 5){
                var cities = ["شهر خود را انتخاب کنید...","ساوجبلاغ","طالقان","کرج","نظرآباد"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 6){
                var cities = ["شهر خود را انتخاب کنید...","آبدانان","ایلام","ایوان","دره‌شهر","دهلران","شیروان و چرداول","مهران"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 7){
                var cities = ["شهر خود را انتخاب کنید...","بوشهر","تنگستان","جم","دشتستان","دشتی","دیر","دیلم","کنگان","گناوه"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 8){
                var cities = ["شهر خود را انتخاب کنید...","ورامین","فیروزکوه","شهریار","شمیرانات","ری","رباط‌کریم","دماوند","تهران","پاکدشت","اسلام‌شهر"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 9){
                var cities = ["شهر خود را انتخاب کنید...","اردل","بروجن","شهرکرد","فارسان","کوهرنگ","لردگان"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 10){
                var cities = ["شهر خود را انتخاب کنید...","بیرجند","درمیان","سرایان","سربیشه","فردوس","قائنات","نهبندان"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 11){
                var cities = ["شهر خود را انتخاب کنید...","بردسکن","تایباد","تربت جام","تربت حیدریه","چناران","خلیل‌آباد","خواف","درگز","رشتخوار","سبزوار","سرخس","فریمان","قوچان","کاشمر","کلات","گناباد","مشهد","مه ولات","نیشابور"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 12){
                var cities = ["شهر خود را انتخاب کنید...","اسفراین","بجنورد","جاجرم","شیروان","فاروج","مانه و سملقان"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 13){
                var cities = ["شهر خود را انتخاب کنید...","آبادان","امیدیه","اندیمشک","اهواز","ایذه","باغ‌ملک","بندر ماهشهر","بهبهان","خرمشهر","دزفول","دشت آزادگان","رامشیر","رامهرمز","شادگان","شوش","شوشتر","گتوند","لالی","مسجد سلیمان","هندیجان"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 14){
                var cities = ["شهر خود را انتخاب کنید...","ابهر","ایجرود","خدابنده","خرمدره","زنجان","طارم","ماه‌نشان"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 15){
                var cities = ["شهر خود را انتخاب کنید...","دامغان","سمنان","شاهرود","گرمسار","مهدی‌شهر"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 16){
                var cities = ["شهر خود را انتخاب کنید...","ایرانشهر","چابهار","خاش","دلگان","زابل","زاهدان","زهک","سراوان","سرباز","کنارک","نیک‌شهر"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 17){
                var cities = ["شهر خود را انتخاب کنید...","آباده","ارسنجان","استهبان","اقلید","بوانات","پاسارگاد","جهرم","خرم‌بید","خنج","داراب","زرین‌دشت","سپیدان","شیراز","فراشبند","فسا","فیروزآباد","قیر و کارزین","کازرون","لارستان","لامرد","مرودشت","ممسنی","مهر","نی‌ریز"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 18){
                var cities = ["شهر خود را انتخاب کنید...","آبیک","البرز","بوئین‌زهرا","تاکستان","قزوین"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 19){
                var cities = ["شهر خود را انتخاب کنید...","قم"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 20){
                var cities = ["شهر خود را انتخاب کنید...","بانه","بیجار","دیواندره","سروآباد","سقز","سنندج","قروه","کامیاران","مریوان"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 21){
                var cities = ["شهر خود را انتخاب کنید...","بافت","بردسیر","بم","جیرفت","راور","رفسنجان","رودبار جنوب","زرند","سیرجان","شهر بابک","عنبرآباد","قلعه گنج","کرمان","کوهبنان","کهنوج","منوجان"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 22){
                var cities = ["شهر خود را انتخاب کنید...","اسلام‌آباد غرب","پاوه","ثلاث باباجانی","جوانرود","دالاهو","روانسر","سرپل ذهاب","سنقر","صحنه","قصر شیرین","کرمانشاه","کنگاور","گیلان غرب","هرسین"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 23){
                var cities = ["شهر خود را انتخاب کنید...","بویراحمد","بهمئی","دنا","کهگیلویه","گچساران"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 24){
                var cities = ["شهر خود را انتخاب کنید...","آزادشهر","آق‌قلا","بندر گز","ترکمن","رامیان","علی‌آباد","کردکوی","کلاله","گرگان","گنبد کاووس","مراوه‌تپه","مینودشت"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 25){
                var cities = ["شهر خود را انتخاب کنید...","آستارا","آستانه اشرفیه","املش","بندر انزلی","رشت","رضوانشهر","رودبار","رودسر","سیاهکل","شفت","صومعه‌سرا","طوالش","فومن","لاهیجان","لنگرود","ماسال"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 26){
                var cities = ["شهر خود را انتخاب کنید...","ازنا","الیگودرز","بروجرد","پل‌دختر","خرم‌آباد","دورود","دلفان","سلسله","کوهدشت"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 27){
                var cities = ["شهر خود را انتخاب کنید...","آمل","بابل","بابلسر","بهشهر","تنکابن","جویبار","چالوس","رامسر","ساری","سوادکوه","قائم‌شهر","گلوگاه","محمودآباد","نکا","نور","نوشهر"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 28){
                var cities = ["شهر خود را انتخاب کنید...","آشتیان","اراک","تفرش","خمین","دلیجان","زرندیه","ساوه","شازند","کمیجان","محلات"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 29){
                var cities = ["شهر خود را انتخاب کنید...","ابوموسی","بستک","بندر عباس","بندر لنگه","جاسک","حاجی‌آباد","خمیر","رودان","قشم","گاوبندی","میناب"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 30){
                var cities = ["شهر خود را انتخاب کنید...","اسدآباد","بهار","تویسرکان","رزن","کبودرآهنگ","ملایر","نهاوند","همدان"];
                listCities(getSelectState, cities, getSelectCity);
            }
            if(getSelectState.selectedIndex === 31){
                var cities = ["شهر خود را انتخاب کنید...","ابرکوه","اردکان","بافق","تفت","خاتم","صدوق","طبس","مهریز","میبد","یزد"];
                listCities(getSelectState, cities, getSelectCity);
            }
        };
    }
    window.onload = function(){
        citiesDropDown();
    };
});