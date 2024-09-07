define(function()
{
	// get next day
	Date.prototype.addDays = function(days) {
		var dat = new Date(this.valueOf())
		dat.setDate(dat.getDate() + days);
		return dat;
	}

	//format date
	Date.prototype.format = function() {
		var mm = this.getMonth() + 1;
		var dd = this.getDate();
		if (mm < 10) 
			mm = '0' + mm;		
		if (dd < 10) 
			dd = '0' + dd;		
		return this.getFullYear()+`-`+mm+`-`+dd;
	};

	return function(start,endCount,holidays)
	{
		var currentObj = new Date(start);
		var next = false;

			if (isWeekEnd(currentObj))
			{ 	
				endCount ++;
			}

		var i = 0; 
		while(i < endCount)
		{
			currentObj = currentObj.addDays(1);
			if (!isWeekEnd(currentObj))
			{ 	
				i++;
			}
		}
	
		function isWeekEnd(date)
		{
			if (date.getDay() == 6 || date.getDay() == 0)
			{ 
				return true;
			}
			else
			{
				key = date.format();
				if (holidays.includes(key))
				{
					return true;
				}
				else
				{
					return false;
				}			
			}
		}
		return currentObj;
	}

	
});