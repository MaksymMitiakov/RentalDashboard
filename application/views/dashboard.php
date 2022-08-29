<body class="">
	<div class="wrapper ">

		<!-- Top NavBar -->
		<?php $this->load->view('navigation/sidebar'); ?>
		<!-- End of NavBar -->

		<div class="main-panel">

			<!-- Navbar -->
			<?php $this->load->view('navigation/topbar'); ?>
			<!-- End Navbar -->

			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header card-header-warning card-header-icon">
									<div class="card-icon">
										<i class="material-icons pl-2">groups</i>
									</div>
									<p class="card-category"><?php echo $this->lang->line("customers"); ?></p>
									<h3 class="card-title"><?php echo $customers; ?>
									</h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">groups</i>
										<a href="<?php echo base_url(); ?>customers/new-customers" class="text-warning"><?php echo $this->lang->line("showall"); ?></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header card-header-success card-header-icon">
									<div class="card-icon">
										<i class="material-icons pl-2">business</i>
									</div>
									<p class="card-category"><?php echo $this->lang->line("buildings"); ?></p>
									<h3 class="card-title"><?php echo $buildings; ?>
									</h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">business</i>
										<a href="<?php echo base_url(); ?>buildings/new-buildings" class="text-warning"><?php echo $this->lang->line("showall"); ?></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header card-header-danger card-header-icon">
									<div class="card-icon">
										<i class="material-icons pl-2">home</i>
									</div>
									<p class="card-category"><?php echo $this->lang->line("homes"); ?></p>
									<h3 class="card-title"><?php echo $homes; ?>
									</h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">home</i>
										<a href="<?php echo base_url(); ?>homes/new-homes" class="text-warning"><?php echo $this->lang->line("showall"); ?></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header card-header-info card-header-icon">
									<div class="card-icon">
										<i class="material-icons pl-2">create</i>
									</div>
									<p class="card-category"><?php echo $this->lang->line("contracts"); ?></p>
									<h3 class="card-title"><?php echo $contracts; ?>
									</h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">create</i>
										<a href="<?php echo base_url(); ?>contract/approved-contracts" class="text-warning"><?php echo $this->lang->line("showall"); ?></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header card-header-info card-header-icon">
									<div class="card-icon">
										<i class="material-icons">attach_money</i>
									</div>
									<p class="card-category"><?php echo $this->lang->line("total_revenue"); ?></p>
									<h3 class="card-title revenue">
										<?php if (empty($totals['amnt'])) {
											echo '0.00';
										} else {
											echo $totals['amnt'];
										} ?>TL</h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">attach_money</i>
										<a href="<?php echo base_url(); ?>contract/approved-contracts" class="text-warning"><?php echo $this->lang->line("showall"); ?></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header card-header-success card-header-icon">
									<div class="card-icon">
										<i class="material-icons">arrow_downward</i>
									</div>
									<p class="card-category"><?php echo $this->lang->line("charged"); ?></p>
									<h3 class="card-title revenue"><?php if (empty($payments['amnt'])) {
																		echo '0.00';
																	} else {
																		echo $payments['amnt'];
																	} ?>TL</h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">arrow_downward</i>
										<a href="<?php echo base_url(); ?>contract/paid-contracts" class="text-warning"><?php echo $this->lang->line("showall"); ?></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header card-header-warning card-header-icon">
									<div class="card-icon">
										<i class="material-icons">arrow_upward</i>
									</div>
									<p class="card-category"><?php echo $this->lang->line("pendingpayments"); ?></p>
									<h3 class="card-title revenue">
										<?php if (empty($pendings['amnt'])) {
											echo '0.00';
										} else {
											echo $pendings['amnt'];
										} ?>TL</h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">arrow_upward</i>
										<a href="<?php echo base_url(); ?>contract/new-contracts" class="text-warning"><?php echo  $this->lang->line("showall"); ?></a>
									</div>
								</div>
							</div>
						</div>


						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header card-header-danger card-header-icon">
									<div class="card-icon">
										<i class="material-icons">warning</i>
									</div>
									<p class="card-category"><?php echo $this->lang->line("pendingpayments"); ?></p>
									<h3 class="card-title"></h3>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">warning</i>
										<a href="<?php echo base_url(); ?>contracts/new-contracts" class="text-warning"><?php echo $this->lang->line("showall"); ?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="card">
								<div class="card-header card-header-primary">
									<h4 class="card-title">
										<?php echo $this->lang->line("incomingcontracts"); ?>
									</h4>
									<p class="card-category"><?php echo $this->lang->line("contracts_due_date_for_this_month"); ?></p>
								</div>
								<div class="card-body">
									<table class="table">
										<thead>
											<th><?php echo $this->lang->line("contract_no"); ?></th>
											<th><?php echo $this->lang->line("amount_contract"); ?></th>
											<th><?php echo $this->lang->line("date"); ?></th>
										</thead>
										<tbody>

											<?php
											if (!empty($incoming)) { ?>
												<?php foreach ($incoming as $key => $d) { ?>
													<tr>

														<td><a href="<?php echo base_url() . 'payments/contract-details/' . $d['id']; ?>"><?php echo $d['id']; ?></a></td>

														<td>
															<?php echo $d['contract_amount']; ?>
														</td>
														<td>
															<?php echo changeDate($d['date']); ?>
														</td>
													</tr>
												<?php }
											} else { ?>
												<tr>
													<td colspan="3" class="text-center"><?php echo $this->lang->line("no_data_available"); ?></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="card">
								<div class="card-header card-header-primary">
									<h4 class="card-title"><?php echo $this->lang->line("mytask"); ?></h4>
									<p class="card-category"><?php echo $this->lang->line("you_can_add_task"); ?></p>
								</div>
								<div class="card-body">
									<div class="card-body">
										<table class="table">
											<tbody>
												<?php if (!empty($task)) { ?>
													<?php foreach ($task as $key => $mytask) { ?>
														<tr class="task<?php echo $mytask['task_id']; ?>">
															<td><?php echo $mytask['description']; ?></td>
															<td><?php echo $this->lang->line($mytask['status']); ?></td>
															<?php if ($mytask['status'] == "Completed") { ?>
																<td class="td-actions text-right">
																	<button type="button" rel="tooltip" title="<?php echo $this->lang->line("remove"); ?>" class="btn btn-danger btn-link btn-sm remove_task" id="<?php echo $mytask['task_id']; ?>">
																		<i class="material-icons">close</i>
																	</button></td>
															<?php } else { ?>
																<td class="td-actions text-right">
																	<button type="button" rel="tooltip" title="<?php echo $this->lang->line("done_task"); ?>" class="btn btn-success btn-link btn-sm done_task" id="<?php echo $mytask['task_id']; ?>">
																		<i class="material-icons">done_all</i>
																	</button>
																	<button type="button" rel="tooltip" title="<?php echo $this->lang->line("edit_task"); ?>" class="btn btn-primary btn-link btn-sm edit_task" id="<?php echo $mytask['task_id']; ?>">
																		<i class="material-icons">edit</i>
																	</button>
																	<button type="button" rel="tooltip" title="<?php echo $this->lang->line("remove"); ?>" class="btn btn-danger btn-link btn-sm remove_task" id="<?php echo $mytask['task_id']; ?>">
																		<i class="material-icons">close</i>
																	</button>
																</td>
															<?php } ?>
														</tr>
														<tr class="cancel_task<?php echo $mytask['task_id']; ?>" style="display: none;">
															<form id="edit_task" method="POST">
																<td>
																	<input class="form-control task_des" type="text" name="description" value="<?php echo $mytask['description']; ?>">
																</td>
																<td><?php echo $mytask['status']; ?></td>
																<td class="td-actions text-right">
																	<button rel="tooltip" title="<?php echo $this->lang->line("update_task"); ?>" class="btn btn-success btn-link btn-sm update_task" id="<?php echo $mytask['task_id']; ?>">
																		<i class="material-icons">done</i>
																	</button>
																	<button type="button" rel="tooltip" title="<?php echo $this->lang->line("cancel_task"); ?>" class="btn btn-danger btn-link btn-sm cancel_task" id="<?php echo $mytask['task_id']; ?>">
																		<i class="material-icons">close</i>
																	</button>
																</td>
															</form>
														</tr>
													<?php }
												} else { ?>
													<tr>
														<td class="text-center"><?php echo $this->lang->line("no_created_task"); ?></td>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="card">
								<div class="card-header card-header-primary">
									<h4 class="card-title">
										<?php echo $this->lang->line("unpaidcontracts"); ?>
									</h4>
									<p class="card-category"><?php echo $this->lang->line("contracts_unpaid_for_this_month"); ?></p>
								</div>
								<div class="card-body">
									<table class="table">
										<thead>
											<th><?php echo $this->lang->line("contract_no"); ?></th>
											<th><?php echo $this->lang->line("amount_contract"); ?></th>
											<th><?php echo $this->lang->line("due_date"); ?></th>
										</thead>
										<tbody>

											<?php
											if (!empty($unpaid)) { ?>
												<?php foreach ($unpaid as $key => $d) { ?>
													<tr>
														<td><a href="<?php echo base_url() . 'payments/contract-details/' . $d['id']; ?>"><?php echo $d['id']; ?></a></td>
														<td>
															<?php echo $d['contract_amount']; ?>
														</td>
														<td>
															<?php echo changeDate($d['due_date']); ?>
														</td>
													</tr>
												<?php }
											} else { ?>
												<tr>
													<td colspan="3" class="text-center"><?php echo $this->lang->line("no_data_available"); ?></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>

								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="card">
								<div class="card-header card-header-primary">
									<h4 class="card-title">
										<?php echo $this->lang->line("expire_contracts"); ?>
									</h4>
									<p class="card-category"><?php echo $this->lang->line("contracts_will_be_expire"); ?></p>
								</div>
								<div class="card-body">
									<table class="table">
										<thead>
											<th><?php echo $this->lang->line("contract_no"); ?></th>
											<th><?php echo $this->lang->line("amount_contract"); ?></th>
											<th><?php echo $this->lang->line("due_date"); ?></th>
										</thead>
										<tbody>

											<?php
											if (!empty($expire)) { ?>
												<?php foreach ($expire as $key => $d) { ?>
													<tr>
														<td><a href="<?php echo base_url() . 'payments/contract-details/' . $d['id']; ?>"><?php echo $d['id']; ?></a></td>
														<td>
															<?php echo $d['contract_amount']; ?>
														</td>
														<td>
															<?php echo changeDate($d['due_date']); ?>
														</td>
													</tr>
												<?php }
											} else { ?>
												<tr>
													<td colspan="3" class="text-center"><?php echo $this->lang->line("no_data_available"); ?></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>

								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
