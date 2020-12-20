<div class="content admin-manage" data-ng-controller="AdminCtrl">
	<div class="container">
		<div class="row">
			<div class="col-xs-11">
				<div class="box-form">
					<form novalidate="novalidate" name="add_customer_admin">
						<div class="row">
							<div class="col-md-5">
								<div class="box-form-wrapper">
									<input data-ng-model="customer.email" name="email" data-ng-class="{ 'has-error' : add_customer_admin.email.$touched && add_customer_admin.email.$invalid || add_customer_admin.$submitted && add_customer_admin.email.$invalid, 'has-success' : add_customer_admin.email.$touched && add_customer_admin.email.$valid || add_customer_admin.$submitted && add_customer_admin.email.$valid }" type="email" placeholder="Email (Wymagane)" required="required" />
									<div class="half-wrap clearfix">
										<input data-ng-model="customer.first_name" name="first_name" data-ng-class="{ 'has-error' : add_customer_admin.first_name.$touched && add_customer_admin.first_name.$invalid || add_customer_admin.$submitted && add_customer_admin.first_name.$invalid, 'has-success' : add_customer_admin.first_name.$touched && add_customer_admin.first_name.$valid || add_customer_admin.$submitted && add_customer_admin.first_name.$valid }" type="text" placeholder="Imię" class="pull-left" />
										<input data-ng-model="customer.last_name" name="last_name" data-ng-class="{ 'has-error' : add_customer_admin.last_name.$touched && add_customer_admin.last_name.$invalid || add_customer_admin.$submitted && add_customer_admin.last_name.$invalid, 'has-success' : add_customer_admin.last_name.$touched && add_customer_admin.last_name.$valid || add_customer_admin.$submitted && add_customer_admin.last_name.$valid }" type="text" placeholder="Nazwisko" class="pull-right" />
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="box-form-wrapper">
									<select required="required" data-ng-init="get_roles(); customer.role = '';" name="role" data-ng-class="{ 'has-error' : add_customer_admin.role.$touched && add_customer_admin.role.$invalid || add_customer_admin.role.$invalid && add_customer_admin.$submitted, 'has-success' : add_customer_admin.role.$touched && add_customer_admin.$valid || add_customer_admin.$submitted &&  add_customer_admin.$valid }" data-ng-model="customer.role">
										<option value="" >Wybierz rolę</option>
										<option value="@{{ r.id }}" data-ng-repeat="r in roles">@{{ r.display_name }}</option>
									</select>
								</div>
							</div>
							<div class="col-md-3 text">
								<button type="submit" class="butt-manage" data-ng-click="add_customer()">+  Dodaj użytkownika</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table data-ng-init="get_users()" class="table table-hover table-all">
					<thead>
						<tr>
				   			<th></th>
				   			<th>Username / Email</th>
				   			<th>Imię</th>
				   			<th>Nazwisko</th>
				   			<th>Rola</th>
				   			<th>Komentarz</th>
				   			<th></th>
				   		</tr>
					</thead>
			   		<tbody>
							<tr data-ng-repeat="u in users">
								<td data-ng-class="{ 'green' : u.status == 'sent', 'yellow' : u.status == 'pending' }">
									<div class="wrapper-plugin-img">
									<img data-ng-if=" ! u.avatar" src="/img/user.png" alt="user" />
									<img data-ng-if="u.avatar" src="@{{ '/storage/' + u.avatar }}" alt="user" />
								</div>
								</td>
								<td><span>@{{ u.email }}</span></td>
								<td><span>@{{ u.first_name }}</span></td>
								<td><span>@{{ u.first_name }}</span></td>
								<td>
									<span data-ng-repeat="role in u.role">@{{ role.display_name }}</span>
								</td>
								<td><span>@{{ u.comment }}</span></td>
								<td>
									<a href="javascript:;" >Edit |</a> 
									<a href="javascript:;" data-ng-click="send(u.id)" data-ng-show="u.status != 'sent' && u.status != 'active'" class="donate"> Send |</a>
									<a href="javascript:;" data-ng-click="send(u.id)" data-ng-show="u.status == 'sent'" class="donate-darkgreen"> Resend |</a>
									<a href="javascript:;" data-ng-click="delete(u.id)" class="donate-red"> Delete</a>
								</td>
							</tr>
			   		</tbody>
			  	</table>
			</div>
		</div>
	</div>
</div>