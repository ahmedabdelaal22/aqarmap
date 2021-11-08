<section class="page_title ls s-py-50 corner-title ls invise overflow-visible">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>

					<?php echo $this->lang->line('subscribe_resturant') ?>
				</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="<?=base_url('/')?>">

							<?php echo $this->lang->line('home') ?>

						</a>
					</li>
					<li class="breadcrumb-item active">

						<?php echo $this->lang->line('subscribe_resturant') ?>
					</li>
				</ol>
				<div class="divider-15 d-none d-xl-block"></div>
			</div>
		</div>
	</div>
</section>
<section id="map" class="ls ms page_map contact1" data-draggable="false" data-scrollwheel="false">
	<?=appSettings('map')?>
</section>

<section class="ls s-pt-30 s-pb-130 s-pt-md-75">
	<div class="container">
		<div class="row">

			<div class="divider-40 d-none d-xl-block"></div>

			<div class="col-lg-8 offset-lg-2 animate" data-animation="scaleAppear">

				<h4 class="text-center">

					<?php echo $this->lang->line('subscribe_resturant_form') ?>

				</h4>
				<div class="alert alert-danger" id="allererror" style="display:none">
					<a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<span id="errorspan"></span>
				</div>
				<div class="divider-40 d-none d-xl-block"></div>
				<form class="contact-form c-mb-20 text-center" id="cform">

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group has-placeholder">
								<label for="name">
									<?php echo $this->lang->line('full_name') ?>

									<span class="required">*</span>
								</label>
								<input type="text" aria-required="true" size="30" value="" name="name" id="name"
									class="form-control" placeholder="<?php echo $this->lang->line('full_name') ?>">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group has-placeholder">
								<label for="phone"><?php echo $this->lang->line('phone') ?>
									<span class="required">*</span>
								</label>
								<input type="text" aria-required="true" size="30" value="" name="phone" id="phone"
									class="form-control" placeholder="<?php echo $this->lang->line('phone') ?>">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="form-group has-placeholder">
								<label for="email">
									<?php echo $this->lang->line('category') ?>
									<span class="required">*</span>
								</label>
								<select class="form-control" name="category_id" required id="category_id">
									<?php $category = $this->admin_model->get_category(); ?>
									<option value=""> <?php echo $this->lang->line('category') ?></option>
									<?php foreach ($category as $listing) : ?>
									<option value="<?php echo $listing['id']; ?>"><?php echo $listing['c_name']; ?>
									</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group has-placeholder">
								<label for="address"><?php echo $this->lang->line('address') ?>
									<span class="required">*</span>
								</label>
								<input type="text" aria-required="true" size="30" value="" name="address" id="address"
									class="form-control" placeholder="<?php echo $this->lang->line('address') ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group has-placeholder">
								<label for="message">
									<?php echo $this->lang->line('description') ?>
								</label>
								<textarea aria-required="true" rows="6" cols="45" name="description" id="description"
									class="form-control"
									placeholder="<?php echo $this->lang->line('description') ?>"></textarea>
							</div>
						</div>

					</div>
					<div class="row c-mt-md-15 c-md-0">
						<div class="col-sm-12">
							<div class="form-group text-center contact-form1">
								<button type="button" id="contact_form_submit" name="contact_submit"
									class="btn btn-maincolor">
									<?php echo $this->lang->line('submit') ?>
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>

			<!--.col-* -->

			<div class="divider-75 d-none d-xl-block"></div>

		</div>
	</div>
</section>


<script type="text/javascript">
	$(document).ready(function () {
		$("#contact_form_submit").click(function (e) {

			e.preventDefault();



			var name = $("input[name='name']").val();
			var description = $("textarea[name='description']").val();
			var category_id = $("#category_id option:selected").val();
			var address = $("input[name='address']").val();
			var phone = $("input[name='phone']").val();


			$.ajax({
				url: "<?=base_url('subscribe_submit')?>",
				type: 'POST',
				data: {
					name: name,
					description: description,
					category_id: category_id,
					address: address,
					phone: phone
				},
				success: function (data) {
					console.log(data);
					// console.log(data.status);
					if (data.status == true) {
						alert(data.message);
						$("#cform")[0].reset();
						$("span").remove(".invalid");
						$('input[name=name]').removeClass('invalid');
						$('input[name=phone]').removeClass('invalid');
						$('input[name=description]').removeClass('invalid');
						$('input[name=address]').removeClass('invalid');
						$('#category_id option:selected').removeClass('invalid');

					} else {
						$("#allererror").show();
						$("#errorspan").html(data.message);
			
					}
				}
			});


		});


		function printErrorMsg(msg) {
			$("span").remove(".invalid");
			$('input[name=name]').removeClass('invalid');
			$('input[name=phone]').removeClass('invalid');
			$('input[name=description]').removeClass('invalid');
			$('#category_id option:selected').removeClass('invalid');
			$('input[name=address]').removeClass('invalid');
			$.each(msg, function (key, value) {

				$('input[name=' + key + ']').addClass('invalid');
				$(document).find('[name=' + key + ']').after('<span class="text-strong invalid">' + value +
					'</span>')

			});
		}
	});

</script>
