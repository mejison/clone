<div class="content signin" data-ng-controller="AuthCtrl">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box-form">
					<div class="box-form-inside">
						<form name="form_signin" novalidate="novalidate">
							<input data-ng-class="{'has-error' : form_signin.email.$touched && form_signin.email.$invalid || form_signin.$submitted && form_signin.email.$invalid, 'has-success' : form_signin.email.$touched && form_signin.email.$valid}" type="email" placeholder="Email Adress" name="email" required="required" data-ng-model="email" />
							
							<input data-ng-class="{'has-error' : form_signin.password.$touched && form_signin.password.$invalid || form_signin.$submitted && form_signin.password.$invalid, 'has-success' : form_signin.password.$touched && form_signin.password.$valid}" type="password" placeholder="Hasło" name="password" required="required" data-ng-model="password" />

							<label for="checking" class="checking-label unselectable">
								<input type="checkbox" data-ng-model="remember_me" id="checking" />
								<span></span>
								<span>Zapamiętaj mnie</span>
							</label>
							<button type="submit" data-ng-click="signin()" class="butt">Zaloguj się</button>
						</form>
					</div>
				</div>
				<div class="text-center">
					<a href="{{ url('/auth/signup') }}" class="registration-butt">Zgłoszenie o dostęp  ></a>
				</div>
			</div>
		</div>
	</div>
</div>
