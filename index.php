<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Shri Bhairavnath Transport</title>
	<link rel="stylesheet" href="style.css" />

</head>


</head>

<body>
	<?php
	if (isset($_GET['success']) ) {
		if( $_GET['success'] == 'true'){
	?>
		<script>
			window.onload = (event) => {
				Swal.fire(
					'Good job!',
					'Your data is successfully added!',
					'success'
				)
			};
		</script>
	<?php
	}}
	?>
	<div class="header">
		<h1>Shri Bhairavnath Transport</h1>
		<div class="address-banner">
			<p>
				At.M.I.D.C., Kurkumbh, Gala No. 2, Near Cipla Ltd. | Tal.Daund,
				Dist.Pune | Ph.: 02117-235341 | Mob: 9422520681, 8805317002 | Mail ID:
				nanazagade.kkb@gmail.com
			</p>
		</div>
	</div>
	<div class="invoice-header">
		<h2>Tax Invoice</h2>
	</div>
	<form action="./addData.php" method="POST" id="invoiceForm" enctype="multipart/form-data">
		<div class="dropdown">

			<select id="companySelect" name="companySelect" onchange="showSelectedCompanyAddress() , updateBookedBy() ">
				<option value="">Select a company</option>
				<option value="GILPIN TOUR &amp; TRAVEL MGT. (I) PVT. LTD.">
					GILPIN TOUR &amp; TRAVEL MGT. (I) PVT. LTD.
				</option>
				<option value="EMCURE PHARMACEUTIICALS LT">
					EMCURE PHARMACEUTIICALS LT
				</option>
				<option value="HENKEL ADHESIVES TECHN IN Pvt. Ltd">
					HENKEL ADHESIVES TECHN IN Pvt. Ltd
				</option>
				<option value="HARRO HOEFLIGER PACKAGING SYSTEMS PVT LTD">
					HARRO HOEFLIGER PACKAGING SYSTEMS PVT LTD
				</option>
			</select>
			<div class="right">
				<input type="date" name="invoiceDate" class="invoiceDate" />
				<input type="text" name="invoiceNumber" id="invoiceNumber" value="SBT" placeholder="Enter Invoice Number" />
				<input type="text" name="requestId" id="requestId" placeholder="Enter Request ID" />
			</div>
		</div>
		<p id="selectedCompanyAddress"></p>
		<input type="hidden" id="selectedCompanyAddressHidden" name="selectedCompanyAddressHidden">


		<table>
			<thead>
				<tr style="background-color: #bdbbbb">
					<th>SR.</th>
					<th>DESCRIPTION</th>
					<th>RATE</th>
					<th>QTY</th>
					<th>AMOUNT</th>
				</tr>
			</thead>
			<tbody>
				<tr style="background: 255 255 255">
					<td>1</td>
					<td>
						Booked by:
						<input type="text" id="bookedBy" name="bookedBy" placeholder="Enter name" />
					</td>

					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr style="background: 255 255 255">
					<td>2</td>
					<td>
						<label for="Passenger Name: ">Passenger Name: </label>
						<input type="text" name="passengerName" id="passengerName" placeholder="Enter Passenger Name" required />
					</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td>3</td>
					<td>
						From
						<input type="date" name="fromD" class="invoiceDate" id="fromD" />
						To
						<input type="date" name="toD" class="invoiceDate" id="toD" />
					</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>

				</tr>

				<tr style="background: 255 255 255">
					<td>4</td>
					<td>
						<label for="car">Vehicle Group: </label>
						<select name="car" id="car" onchange="updateRates() ">
							<option value="">Select a Car</option>
							<option value="Toyota">TOYOTA CRYSTA</option>
							<option value="Ikon">IKON</option>
						</select>

						<label for="Vno">Vehicle Number: </label>
						<input type="text" name="Vno" id="Vno" placeholder="Enter a Vehicle Number" required />
					</td>
					<td id="rateColumn"></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>5</td>
					<td>
						<label for="Duty Type">Duty Type: </label>
						<select name="selectedDuty" id="selectedDuty" onchange="updateRates();">
							<option value="">Select a Duty</option>
							<option value="Kkb to Daund">Kkb to Daund</option>
							<option value="Kkb  to Baramati">Kkb to Baramati</option>
							<option value="Kkb to Pune">Kkb to Pune</option>
							<option value="8 Hour - 80 Km">8 Hour - 80 Km</option>
							<option value="Local Transport">Local Transport</option>
							<option value="Out Station" id="outStd">Out Station</option>
						</select>
						<div id="outStationInput" style="display: none;">
							<label for="outStationInputField">Out Station Input:</label>
							<input type="text" name="outStationInputField" id="outStationInputField">
						</div>

						<input type="file" name="uploadDuty" class="upload" id="uploadDuty">
					</td>

					<td>
						<input type="text" name="rate	 " id="rate" placeholder="Rates as per Duty" />
					</td>
					<td>-</td>
					<td>
						<input type="number" name="dutyAmt" id="dutyAmt" value="" />
					</td>
				</tr>

				<tr>

				</tr>

				<tr>
					<td>6</td>
					<td>
						<label for="extHrs">Extra Hrs: </label>
					</td>
					<td>
						<input type="text" name="extHrs" id="extHrs" value="0" />
					</td>
					<td>
						<input type="text" name="myQty" contenteditable="true" id="myQty" value="0" onchange="extraHrs(this.value)" placeholder="Enter Quantity" />
					</td>
					<td>
						<input type="number" name="extHAmt" id="extHAmt" value="0" />
					</td>
				</tr>

				<tr>
					<td>7</td>
					<td>
						<label for="extKms">Extra Kms: </label>
					</td>
					<td>
						<input type="text" name="exKm" id="exKm" />
					</td>
					<td>
						<input type="text" name="extKms" placeholder="Enter Extra Kms" id="extKms" onchange="extrakms(this.value)" />
					</td>
					<td>
						<input type="number" name="extKAmt" id="extKAmt" value="0" />
					</td>
				</tr>

				<tr>
					<td>8</td>
					<td>Parking & Toll.

						<input type="file" placeholder="upload" name="uploadPaT" class="upload" id="uploadPaT">
					</td>
					<td></td>
					<td></td>
					<td>
						<input type="text" name="pnt" value="0" placeholder="Enter AMOUNT" id="pnt" required />
					</td>
				</tr>
				<tr>
					<td>9</td>
					<td>Night allowance
						<input type="checkbox" name="na" id="na" value="0" updateNightAllowance()>
					</td>
					<td></td>
					<td></td>
					<td><input type="text" name="nightAllow" id="nightAllow" value="0"></td>
				</tr>

				<tr>
					<td>10</td>
					<td>TOTAL</td>
					<td></td>
					<td></td>
					<td><input type="text" name="totalAmount" id="totalAmount" onchange="updateTotalAndInWords();"></td>
				</tr>

				<tr>
					<td>11</td>
					<td>In words :</td>
					<!-- <td colspan="3" id="inWordsCell"  name="inWordsCell" >

					</td> -->

					<td colspan="3" id="inWordsCell" name="inWordsCell"></td>
					<!-- Add the hidden input field -->
					<input type="hidden" id="inWordsInput" name="inWordsInput" value="">

				</tr>
			</tbody>
		</table>



		<div class="button-container ">

			<input type="submit" class="btn" value="Submit">

			<a href="recipt.php?print" class="btn btn-danger" target="_blank">Print PDF</a>
			<!-- <a href="recipt.php?download" class="btn btn-danger" target="_blank">Download PDF</a> -->
			
		</div>

		<!-- Footer -->
		
		<footer>
        <div class="footer-content">
            <!-- <div class="social-icons">
                <a href="#" target="_blank">Facebook</a>
                <a href="#" target="_blank">Twitter</a>
                <a href="#" target="_blank">LinkedIn</a>
                <a href="#" target="_blank">Instagram</a>
            </div> -->
            <div class="copyright">
                &copy; 2023 Shri Bhairavnath Transport
            </div>
        </div>
    </footer>

	</form>


 

	<script src="script.js"></script>


	<script>
		document.addEventListener('DOMContentLoaded', function() {
			// Prevent form submission on Enter key press
			document.addEventListener('keydown', function(event) {
				if (event.key === 'Enter') {
					event.preventDefault();
				}
			});
		});
	</script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>