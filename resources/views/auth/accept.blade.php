<div class="page-signin" ng-controller="AuthCtrl">

    <div class="signin-header form-group">
        <section class="logo text-center">
            <div class="wrap-logo">
                <a href="/">
                    <img src="/img/logo.png" alt="Clone" />
                </a>
            </div>
        </section>
    </div>

   <div class="signin-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="form-container">
                            <form novalidate="novalidate" name="form_accept">
								<div class="box-form">
									<div class="box-form-inside">
										<div class="box-form-inside-row">
											<div>
												<span>Password (wymagane)</span>
											</div>
											<input type="password" data-ng-class="{ 'has-error' : form_accept.password.$touched && form_accept.password.$invalid || form_accept.$submitted && form_accept.password.$invalid, 'has-success' : form_accept.password.$touched && form_accept.password.$valid || form_accept.$submitted && form_accept.password.$valid }" data-ng-model="password" name="password" required="required" />
										</div>
										<div class="box-form-inside-row">
											<div>
												<span>Confirm Password (wymagane)</span>
											</div>
											<input type="password" data-ng-class="{ 'has-error' : form_accept.confirm_password.$touched && form_accept.confirm_password.$invalid && confirm_password != password || form_accept.$submitted && form_accept.confirm_password.$invalid && confirm_password != password, 'has-success' : form_accept.confirm_password.$touched && form_accept.confirm_password.$valid && confirm_password == password || form_accept.$submitted && form_accept.confirm_password.$valid && confirm_password == password }" data-ng-model="confirm_password" name="confirm_password" required="required" />
										</div>
									</div>
								</div>
								<div class="text-center">
									<button type="submit" class="butt" data-ng-click="accept()">Activate</button>
								</div>
							</form>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>