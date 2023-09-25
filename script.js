const companyAddressMap = {
	'GILPIN TOUR & TRAVEL MGT. (I) PVT. LTD.':
		'01/02 G. FLOOR WINDFALL SAHAR PLAZA COMPLEX \n MV ROAD J.B. NAGAR ANDHERI(EAST) MUMBAI 400059\nState of supply: 27-Maharashtra\nPhone: 8291015095\nGSTIN: 27AAACG5748C2ZQ',
	'EMCURE PHARMACEUTIICALS LT':
		'T-184, MIDC BHOSARI PUNE 411026\nGST: 27AAACE4574C1ZV\nPAN: AAACE4574C\nCIN: U24231PN1981PLC024251',
	'HENKEL ADHESIVES TECHN IN Pvt. Ltd':
		'L&T Seawoods, Grand Central, 401 B Wing 4th Floor Tower 1\nGST: 27AAACL1954B1ZW\nCIN NO: U28933MH1990PTC234233',
	'HARRO HOEFLIGER PACKAGING SYSTEMS PVT LTD':
		'2ND Floor, Salarpuria Galleria Building 20/1\n Bellary Road, Kashi Nagar Byatarayanapura Bengaluru, Karnataka 560092',
};

function showSelectedCompanyAddress() {
	var dropdown = document.getElementById('companySelect');
	var selectedCompany = dropdown.options[dropdown.selectedIndex].value;
	var address = companyAddressMap[selectedCompany];
	  // Update the hidden input value
	  document.getElementById('selectedCompanyAddressHidden').value = address;

	  // Update the displayed address (if needed)
	  document.getElementById('selectedCompanyAddress').innerText = 'Address: ' + address;
}

function updateBookedBy() {
	var dropdown = document.getElementById('companySelect');
	var selectedCompany = dropdown.options[dropdown.selectedIndex].value;
	var bookedByInput = document.getElementById('bookedBy')

	switch (selectedCompany) {
		case 'GILPIN TOUR & TRAVEL MGT. (I) PVT. LTD.':
			bookedByInput.value = 'SUDESH';
			break;
		case 'EMCURE PHARMACEUTIICALS LT':
			bookedByInput.value = 'PRAVIN';
			break;
		case 'HENKEL ADHESIVES TECHN IN Pvt. Ltd':
			bookedByInput.value = 'SOURABH';
			break;
		case 'HARRO HOEFLIGER PACKAGING SYSTEMS PVT LTD':
			bookedByInput.value = 'ASWATHI';
			break;
		default:
			bookedByInput.value = '';
			break;
	}
}

function updateRates() {
	var vehicleDropdown = document.getElementById('car');
	var dutyDropdown = document.getElementById('selectedDuty');
	var rateInput = document.getElementById('rate');
	var extraHrsInput = document.getElementById('extHrs'); // Add this line
	var extraKmsInput = document.getElementById('exKm');
	var amountInput = document.getElementById('dutyAmt'); // Add this line
	var qtyInput = document.querySelector('[name="myQty"]');

	var selectedVehicle = vehicleDropdown.value;
	var selectedDuty = dutyDropdown.value;

	var ratesMap = {
		Toyota: {
			'Kkb to Daund': { rate: 1200, extraHrsRate: 200, extraKmsRate: 25 }, // Add extraHrsRate and extraKmsRate for Toyota
			'Kkb  to Baramati': { rate: 2500, extraHrsRate: 200, extraKmsRate: 25 },
			'Kkb to Pune': { rate: 4500, extraHrsRate: 200, extraKmsRate: 25 },
			'8 Hour - 80 Km': { rate: 4500, extraHrsRate: 200, extraKmsRate: 25 },
			'Local Transport': { rate: 2500, extraHrsRate: 200, extraKmsRate: 25 },
			'Out Station': { rate:"", extraHrsRate: 200, extraKmsRate: 25 },
		},
		Ikon: {
			'Kkb to Daund': { rate: 900, extraHrsRate: 130, extraKmsRate: 16 }, // Add extraHrsRate and extraKmsRate for Ikon
			'Kkb  to Baramati': { rate: 2000, extraHrsRate: 130, extraKmsRate: 16 },
			'Kkb to Pune': { rate: 3200, extraHrsRate: 130, extraKmsRate: 16 },
			'8 Hour - 80 Km': { rate: 2700, extraHrsRate: 130, extraKmsRate: 16 },
			'Local Transport': { rate: 1300, extraHrsRate: 130, extraKmsRate: 16 },
			'Out Station': { rate:"", extraHrsRate: 130, extraKmsRate: 16 },
		},
		// Add more vehicle groups and their rates here
	};

	if (ratesMap[selectedVehicle] && ratesMap[selectedVehicle][selectedDuty]) {
		rateInput.value = ratesMap[selectedVehicle][selectedDuty].rate;
		extraHrsInput.value = ratesMap[selectedVehicle][selectedDuty].extraHrsRate; // Set extraHrsRate
		extraKmsInput.value = ratesMap[selectedVehicle][selectedDuty].extraKmsRate;
		amountInput.value = ratesMap[selectedVehicle][selectedDuty].rate; // Set extraKmsRate
	} else {
		rateInput.value = '';
		extraHrsInput.value = ''; // Clear extraHrsRate
		extraKmsInput.value = '';
		amountInput.value = ''; // Clear extraKmsRate
	}
}



const extraHrs = (value) => {
    document.getElementById('extHAmt').value = value * parseFloat(document.getElementById('extHrs').value);
}

const extrakms = (value) => {
    document.getElementById('extKAmt').value = value * parseFloat(document.getElementById('exKm').value)
}

window.onchange = () => {
    const total = document.getElementById('totalAmount');

    
    

    let dutyAmount = parseFloat(document.getElementById('dutyAmt').value)
    let extraHrs = parseFloat(document.getElementById('extHAmt').value)
    let extraKms = parseFloat(document.getElementById('extKAmt').value)
    let nightAllowance = parseFloat(document.getElementById('nightAllow').value)
    let parking = parseFloat(document.getElementById('pnt').value)

    total.value = dutyAmount + extraHrs + extraKms + nightAllowance + parking
}



document.getElementById("selectedDuty").addEventListener("change", function() {
	var outStationInput = document.getElementById("outStationInput");
	if (this.value === "Out Station") {
		outStationInput.style.display = "inline-block";
		// outStationInput.style.float = "right";
		
	} else {
		outStationInput.style.display = "none";
	}
});




// Add this code to your existing script.js file

// Function to update the "Night Allowance" amount based on the checkbox
function updateNightAllowance() {
    const nightAllowanceCheckbox = document.getElementById('na');
    const nightAllowanceAmountInput = document.getElementById('nightAllow');

    if (nightAllowanceCheckbox.checked) {
        nightAllowanceAmountInput.value = 1000; // Set the value when checkbox is checked
    } else {
        nightAllowanceAmountInput.value = 0; // Clear the value when checkbox is unchecked
    }

    // Trigger the change event to recalculate the total
    nightAllowanceAmountInput.dispatchEvent(new Event('change'));
}

// Attach the event listener to the checkbox
document.getElementById('na').addEventListener('change', updateNightAllowance);


function numberToWords(number) {
    const numbers = [
        '', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine',
        'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'
    ];

    const tens = [
        '', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'
    ];

    const scales = [
        '', 'Thousand', 'Lakh', 'Crore'
    ];

    if (number < 20) {
        return numbers[number];
    } else if (number < 100) {
        return tens[Math.floor(number / 10)] + (number % 10 !== 0 ? ' ' + numbers[number % 10] : '');
    } else if (number < 1000) {
        return numbers[Math.floor(number / 100)] + ' Hundred' + (number % 100 !== 0 ? ' ' + numberToWords(number % 100) : '');
    } else {
        let scaleIndex = 0;
        let scaledNumber = '';
        
        while (number > 0) {
            const remainder = number % 1000;
            if (remainder !== 0) {
                scaledNumber = numberToWords(remainder) + (scaleIndex > 0 ? ' ' + scales[scaleIndex] : '') + ' ' + scaledNumber;
            }
            number = Math.floor(number / 1000);
            scaleIndex++;
        }
        
        return scaledNumber;
    }
}






// function updateTotalAndInWords() {
//     const totalAmountInput = document.getElementById('totalAmount');
//     const inWordsCell = document.getElementById('inWordsCell');

//     const totalAmount = parseFloat(totalAmountInput.value);

//     const totalAmountInWords = numberToWords(Math.round(totalAmount));
// ``
//     console.log('Total Amount:', totalAmount);
//     console.log('Total Amount in Words:', totalAmountInWords);

//     inWordsCell.textContent = `In words Amount : ${totalAmountInWords.toUpperCase()} Ruppes only`;
// }


// // Attach input event listeners to all relevant fields
// const inputFields = [
//     'dutyAmt', 'extHAmt', 'extKAmt', 'pnt', 'nightAllow', 'totalAmount'
// ];

// inputFields.forEach(field => {
//     document.getElementById(field).addEventListener('input', updateTotalAndInWords);
// });




// Function to update the total amount and its in-words representation
function updateTotalAndInWords() {
    const totalAmountInput = document.getElementById('totalAmount');
    const inWordsCell = document.getElementById('inWordsCell');

    const totalAmount = parseFloat(totalAmountInput.value) || 0;
    const totalAmountInWords = numberToWords(Math.round(totalAmount));

    inWordsCell.textContent = `In words Amount : ${totalAmountInWords.toUpperCase()} Rupees only`;


	const inWordsInput = document.getElementById('inWordsInput');
    inWordsInput.value = inWordsCell.textContent;
	
}

// Attach input event listener to totalAmount field
document.getElementById('totalAmount').addEventListener('input', updateTotalAndInWords);

// Call the update function initially to populate the in-words amount
updateTotalAndInWords();




// ... (Your existing code)

window.onchange = () => {
    const total = document.getElementById('totalAmount');

    let dutyAmount = parseFloat(document.getElementById('dutyAmt').value);
    let extraHrs = parseFloat(document.getElementById('extHAmt').value);
    let extraKms = parseFloat(document.getElementById('extKAmt').value);
    let nightAllowance = parseFloat(document.getElementById('nightAllow').value);
    let parking = parseFloat(document.getElementById('pnt').value);

    total.value = dutyAmount + extraHrs + extraKms + nightAllowance + parking;

    updateTotalAndInWords(); // Call the function to update in-words amount
}

// Attach input event listeners to all relevant fields
// const inputFields = [
//     'dutyAmt', 'extHAmt', 'extKAmt', 'pnt', 'nightAllow', 'totalAmount'
// ];

// inputFields.forEach(field => {
//     document.getElementById(field).addEventListener('input', updateTotalAndInWords);
// });

// // Call the function initially to populate the in-words amount
// updateTotalAndInWords();

// ... (Your existing code)






// Add this function to your script.js
function submitForm() {
	const form = document.getElementById('pdfForm');
	const formData = new FormData(form);
  
	fetch('/submit-form', {
	  method: 'POST',
	  body: formData,
	})
	.then(response => response.json())
	.then(data => {
	  // Handle the response from the server
	  console.log(data);
	})
	.catch(error => {
	  console.error('Error:', error);
	});


	    // Set the value of the hidden input field
		const inWordsCellValue = document.getElementById('inWordsCell').textContent;
		document.getElementById('inWordsCellInput').value = inWordsCellValue;
  }




