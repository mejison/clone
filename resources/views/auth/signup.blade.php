<div data-ng-controller="AuthCtrl">
    <div class="content signup">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<form novalidate="novalidate" name="form_signup">
						<div class="box-form">
							<div class="box-form-inside">
								<div class="box-form-inside-row">
									<div>
										<span>Email (wymagane)</span>
									</div>
									<input type="email" data-ng-class="{ 'has-error' : form_signup.email.$touched && form_signup.email.$invalid || form_signup.$submitted && form_signup.email.$invalid, 'has-success' : form_signup.email.$touched && form_signup.email.$valid || form_signup.$submitted && form_signup.email.$valid }" data-ng-model="email" name="email" required="required" />
								</div>
								<div class="box-form-inside-row">
									<div>
										<span>Imię</span>
									</div>
									<input type="text" data-ng-class="{ 'has-error' : form_signup.first_name.$touched && form_signup.first_name.$invalid || form_signup.$submitted && form_signup.first_name.$invalid, 'has-success' : form_signup.first_name.$touched && form_signup.first_name.$valid || form_signup.$submitted && form_signup.first_name.$valid }" data-ng-model="first_name" name="first_name" />
								</div>
								<div class="box-form-inside-row">
									<div>
										<span>Nazwisko</span>
									</div>
									<input type="text" data-ng-class="{ 'has-error' : form_signup.last_name.$touched && form_signup.last_name.$invalid || form_signup.$submitted && form_signup.last_name.$invalid, 'has-success' : form_signup.last_name.$touched && form_signup.last_name.$valid || form_signup.$submitted && form_signup.last_name.$valid }"  data-ng-model="last_name" name="last_name" />
								</div>
								<div class="box-form-inside-row">
									<div>
										<span>Rola (wymagane)</span>
									</div>
									
									<select required="required" data-ng-init="get_roles(); role = '';" name="role" data-ng-class="{ 'has-error' : form_signup.role.$touched && form_signup.role.$invalid || form_signup.$submitted && form_signup.role.$invalid, 'has-success' : form_signup.role.$touched && form_signup.role.$valid || form_signup.$submitted && form_signup.role.$valid }" data-ng-model="role">
										<option value="" >Wybierz rolę</option>
										<option value="@{{ r.id }}" data-ng-repeat="r in roles">@{{ r.display_name }}</option>
									</select>
								</div>
							</div>
						</div>

						<div class="text-center">
							<button type="submit" class="butt" data-ng-click="signup()">Zgłoszenie o dostęp</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>