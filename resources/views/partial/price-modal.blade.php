<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Price Calculator</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Weight (KG)</label>
					<select id="myWeight" class="form-control">
                        <?php
                        $i = 1;
                        do{
                        ?> <option value="{{ $i }}">{{ $i }}</option> <?php
                        $i += 0.5;
                        }while($i <= 70.5)
                        ?>
					</select>
				</div>
				<div class="form-group">
					<label>Price GHC</label>
					<input class="form-control" placeholder="total price" type="text"
					       id="totalPrice" readonly>
				</div>
				<div class="form-group">
					<label for="origin">Product Destination</label>
					<input type="text" class="form-control" id="origin" aria-describedby="name"
					       name="destination" placeholder="Ghana" readonly>
				</div>
				<div class="form-group">
					<button id="priceCal" class="btn btn-success btn-block">
						<i class="fa fa-calculator"></i>
						Calculate Price
					</button>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
