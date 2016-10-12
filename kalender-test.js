window.onload = init;
function init() {
	var year = new Date().getFullYear();
	var month = new Date().getMonth();
	var day = new Date(year, month, 1).getDay();
	var datum = new Date(year, month).getDay();

	if (month == 0) {
		document.getElementById("manad").innerHTML = "Januari";
	}
	else if (month == 1) {
		document.getElementById("manad").innerHTML = "Februari";
	}
	else if (month == 2) {
		document.getElementById("manad").innerHTML = "Mars";
	}
	else if (month == 3) {
		document.getElementById("manad").innerHTML = "April";
	}
	else if (month == 4) {
		document.getElementById("manad").innerHTML = "Maj";
	}
	else if (month == 5) {
		document.getElementById("manad").innerHTML = "Juni";
	}
	else if (month == 6) {
		document.getElementById("manad").innerHTML = "Juli";
	}
	else if (month == 7) {
		document.getElementById("manad").innerHTML = "Augusti";
	}
	else if (month == 8) {
		document.getElementById("manad").innerHTML = "September";
	}
	else if (month == 9) {
		document.getElementById("manad").innerHTML = "Oktober";
		for (var i = 26; i <= 30; i++) {
		document.getElementById("vecka1").innerHTML += '<td class="invDag">' + i + '</td>';
		}
		for (var i = 1; i <= 2; i++) {
		document.getElementById("vecka1").innerHTML += '<td class="dag"><a class="dag">' + i + '</a></td>';
		}
		for (var i = 3; i <= 9; i++) {
		document.getElementById("vecka2").innerHTML += '<td class="dag"><a class="dag">' + i + '</a></td>';
		}
		for (var i = 10; i <= 16; i++) {
		document.getElementById("vecka3").innerHTML += '<td class="dag"><a class="dag">' + i + '</a></td>';
		}
		for (var i = 17; i <= 23; i++) {
		document.getElementById("vecka4").innerHTML += '<td class="dag"><a class="dag">' + i + '</a></td>';
		}
		for (var i = 24; i <= 30; i++) {
		document.getElementById("vecka5").innerHTML += '<td class="dag"><a class="dag">' + i + '</a></td>';
		}
		for (var i = 31; i <= 31; i++) {
		document.getElementById("vecka6").innerHTML += '<td class="dag"><a class="dag">' + i + '</a></td>';
		}
		for (var i = 1; i <= 6; i++) {
		document.getElementById("vecka6").innerHTML += '<td class="invDag">' + i + '</td>';
		}
	}
	else if (month == 10) {
		document.getElementById("manad").innerHTML = "November";
	}
	else {
		document.getElementById("manad").innerHTML = "December";
	};

	//var firstOct = new Date("2016-10-01");
	//console.log(firstOct);
	//console.log(firstOct - 1);
	//console.log(firstOct - 2);

	var fruits, text, fLen, i;

	fruits = [printDays(daysInMonth(7,2009))];
	fLen = fruits.length;
	text = "<tr>";
	for (i = 0; i < fLen; i++) {
    	text += "<td><a>" + fruits[i] + "</a></td>";
    	if (i !== 0 && i % 6 == 0) {
    		text += "</tr><tr>";
    	}
	}
	document.getElementById("kalenderBody").innerHTML = text;



	//Month is 1 based
	function daysInMonth(month,year) {
   		return new Date(year, month, 0).getDate();
	}

	//July
	// daysInMonth(7,2009); //31
	//February
	// daysInMonth(2,2009); //28
	// daysInMonth(2,2008); //29

	function printDays(monthDays) {
		for (i = 1; i <= monthDays; i++) {
			fruits.push(i)
		}
	}

};
	// om första datumet startar på lördag (day == 6)
	/* if (day == 6) {
		// var t = new Date();
		// for (i = 0;
		var andraDagar = new Date(t.getFullYear(), t.getMonth() + 1, i)
		for (i = 26; i <= 30; i++) {
		document.getElementById("vecka1").innerHTML += '<td class="invDag">' + i + '</td>' + i + '<td class="invDag">' + i + '</td>' + i + '<td class="invDag">' + i + '</td>' + i + '<td class="invDag">' + i + '</td>' + i + '<td class="invDag">' + i + '</td>';
		}
		for (i = 1; i <= 2; i++) {
		document.getElementById("vecka1").innerHTML += '<td class="dag"><a class="dag">' + i + '</a></td>';
		}
		for (i = 3; i <= 9; i++) {
		document.getElementById("vecka2").innerHTML += '<td class="dag"><a class="dag">' + i + '</a></td>';
		}
		for (i = 10; i <= 16; i++) {
		document.getElementById("vecka3").innerHTML += '<td class="dag"><a class="dag">' + i + '</a></td>';
		}
		for (i = 17; i <= 23; i++) {
		document.getElementById("vecka4").innerHTML += '<td class="dag"><a class="dag">' + i + '</a></td>';
		}
		for (i = 24; i <= 30; i++) {
		document.getElementById("vecka5").innerHTML += '<td class="dag"><a class="dag">' + i + '</a></td>';
		}
		for (i = 31; i <= 31; i++) {
		document.getElementById("vecka6").innerHTML += '<td class="dag"><a class="dag">' + i + '</a></td>';
		};
	}; */

/* else if (month == 9) {
		document.getElementById("manad").innerHTML = "Oktober";
		for (var i = 26; i <= 30; i++) {
		document.getElementById("vecka1").innerHTML += '<td class="invDag">' + i + '</td>';
		}
		for (var i = 1; i <= 2; i++) {
		document.getElementById("vecka1").innerHTML += '<td class="dag"><a class="dag">' + i + '</a></td>';
		}
		for (var i = 3; i <= 9; i++) {
		document.getElementById("vecka2").innerHTML += '<td class="dag"><a class="dag">' + i + '</a></td>';
		}
		for (var i = 10; i <= 16; i++) {
		document.getElementById("vecka3").innerHTML += '<td class="dag"><a class="dag">' + i + '</a></td>';
		}
		for (var i = 17; i <= 23; i++) {
		document.getElementById("vecka4").innerHTML += '<td class="dag"><a class="dag">' + i + '</a></td>';
		}
		for (var i = 24; i <= 30; i++) {
		document.getElementById("vecka5").innerHTML += '<td class="dag"><a class="dag">' + i + '</a></td>';
		}
		for (var i = 31; i <= 31; i++) {
		document.getElementById("vecka6").innerHTML += '<td class="dag"><a class="dag">' + i + '</a></td>';
		}
		for (var i = 1; i <= 6; i++) {
		document.getElementById("vecka6").innerHTML += '<td class="invDag">' + i + '</td>';
		} */