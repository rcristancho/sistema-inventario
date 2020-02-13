<h1>Formulario Transacciones</h1>
<div class="jumbotron">
	<div class="row form-group">
		<div class="col-4 col-md-4">
	      <label class="form-check-label">
	        <input type="checkbox" class="form-check-input" name="residential" id="residential" value="residential">
	        Residential
	      </label>
		</div>
		<div class="col-4 col-md-4">
	      <label class="form-check-label">
	        <input type="checkbox" class="form-check-input" name="commercial" id="commercial" value="commercial">
	        Commercial
	      </label>
		</div>
	</div>
</div>
<div class="jumbotron">
	<div class="row">
		<div class="col-12 col-md-5">
			<label class="form-label">Transaction Type</label>
			<select class="form-control" name="transaction_type" id="transaction_type">
				<option value="">Select</option>
				<option value="sale">Sale</option>
				<option value="lease">Lease</option>
			</select>
		</div>
		<div class="col-12 col-md-5">
			<label class="form-label">Represent</label>
			<select class="form-control" name="represent" id="represent">
				<option value="">Select</option>
				<option value="seller">Seller</option>
				<option value="buyer">Buyer</option>
				<option value="both">Both</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-md-12">
			<h4>Listing Broker</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-md-5">
			<label for="brokerage_name">Listing Brokerage Name</label>
			<input type="text" name="brokerage_name" class="form-control">
		</div>
		<div class="col-12 col-md-12">
			
		</div>
	</div>
</div>