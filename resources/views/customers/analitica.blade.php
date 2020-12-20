<div class="content analitika" data-ng-controller="AdminCtrl">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<table class="table table-hover table-all" data-ng-init="get_users()">
					<thead>
						<tr>
				   			<th></th>
				   			<th>Imię</th>
				   			<th>Nazwisko</th>
				   			<th>Dodane projekty</th>
				   			<th>Punkty</th>
				   			<th>Zarobione punkty</th>
				   			<th>Wykorzystane punkty</th>
				   			<th></th>
				   		</tr>
					</thead>
			   		<tbody>
						<tr data-ng-repeat="u in users">
							<td>
								<div class="wrapper-plugin-img">
									<img data-ng-if=" ! u.avatar" src="/img/user.png" alt="user" />
									<img data-ng-if="u.avatar" src="@{{ '/storage/' + u.avatar }}" alt="user" />
								</div>
							</td>
							<td>
								<span>@{{ u.first_name }}</span>
							</td>
							<td>
								<span>@{{ u.last_name }}</span>
							</td>
							<td>
								<a href="javascript:void(0);" class="donate">@{{ u.projects.length }}</a>
							</td>
							<td>
								<span>@{{ u.ballance | number : 2 }}</span>
							</td>
							<td>
								<span>@{{ count(u.transaction, 'up') | number : 2 }}</span>
							</td>
							<td>
								<span>@{{ count(u.transaction, 'down') | number : 2 }}</span>
							</td>
							<td>
								<a href="javascript:;" class="donate">Szczegóły użytkownika</a>
							</td>
						</tr>
			   		</tbody>
			  	</table>
			</div>
		</div>
	</div>
</div>