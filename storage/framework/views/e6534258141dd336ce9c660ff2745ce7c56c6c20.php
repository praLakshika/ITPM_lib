<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<style>
			body {
			    font-family: Arial, Helvetica, sans-serif;
			}
			.wrapper {
				margin: 0 -20px 0;
				padding: 0 15px;
			}
		    .middle {
		        text-align: center;
		    }
		    .title {
			    font-size: 35px;
		    }
		    .pb-10 {
		    	padding-bottom: 10px;
		    }
		    .pb-5 {
		    	padding-bottom: 5px;
		    }
		    .head-content{
		    	padding-bottom: 4px;
		    	border-style: none none ridge none;
		    	font-size: 18px;
		    }
            thead { display: table-header-group; }
            tfoot { display: table-row-group; }
            tr { page-break-inside: avoid; }
		    table.table {
		    	font-size: 13px;
		    	border-collapse: collapse;
		    }
			.page-break {
		        page-break-after: always;
		        page-break-inside: avoid;
			}
			tr.even {
				background-color: #eff0f1;
			}
			table .left {
				text-align: left;
			}
			table .right {
				text-align: right;
			}
			table .bold {
				font-weight: 600;
			}
			.bg-black {
				background-color: #000;
			}
			.f-white {
				color: #fff;
			}
			<?php $__currentLoopData = $styles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $style): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php echo e($style['selector']); ?> {
				<?php echo e($style['style']); ?>

			}
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</style>
	</head>
	<body>
		<?php
		$ctr = 1;
		$no = 1;
		$total = [];
		$grandTotalSkip = 1;
		$currentGroupByData = [];
		$isOnSameGroup = true;

		foreach ($showTotalColumns as $column => $type) {
			$total[$column] = 0;
		}

		if ($showTotalColumns != []) {
			foreach ($columns as $colName => $colData) {
				if (!array_key_exists($colName, $showTotalColumns)) {
					$grandTotalSkip++;
				} else {
					break;
				}
			}
		}

        $grandTotalSkip = !$showNumColumn ? $grandTotalSkip - 1 : $grandTotalSkip;
		?>
		<div class="wrapper">
		    <div class="pb-5">
			    <div class="middle pb-10 title">
			        <?php echo e($headers['title']); ?>

			    </div>
    			<?php if($showMeta): ?>
				<div class="head-content">
					<table cellpadding="0" cellspacing="0" width="100%" border="0">
						<?php $metaCtr = 0; ?>
						<?php $__currentLoopData = $headers['meta']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($metaCtr % 2 == 0): ?>
							<tr>
							<?php endif; ?>
								<td><span style="color:#808080;"><?php echo e($name); ?></span>: <?php echo e(ucwords($value)); ?></td>
							<?php if($metaCtr % 2 == 1): ?>
							</tr>
							<?php endif; ?>
							<?php $metaCtr++; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</table>
				</div>
				<?php endif; ?>
		    </div>
		    <div class="content">
		    	<table width="100%" class="table">
		    		<?php if($showHeader): ?>
		    		<thead>
			    		<tr>
							<?php if($showNumColumn): ?>
				    			<th class="left">No</th>
							<?php endif; ?>
			    			<?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colName => $colData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    				<?php if(array_key_exists($colName, $editColumns)): ?>
			    					<th class="<?php echo e(isset($editColumns[$colName]['class']) ? $editColumns[$colName]['class'] : 'left'); ?>"><?php echo e($colName); ?></th>
			    				<?php else: ?>
				    				<th class="left"><?php echo e($colName); ?></th>
			    				<?php endif; ?>
			    			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    		</tr>
		    		</thead>
		    		<?php endif; ?>
		    		<?php
		    		$chunkRecordCount = ($limit == null || $limit > 50000) ? 50000 : $limit + 1;
		    		$__env = isset($__env) ? $__env : null;
					$query->chunk($chunkRecordCount, function($results) use(&$ctr, &$no, &$total, &$currentGroupByData, &$isOnSameGroup, $groupByArr, $grandTotalSkip, $columns, $limit, $editColumns, $showTotalColumns, $applyFlush, $showNumColumn, $__env) {
					?>
		    		<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php
							if ($limit != null && $ctr == $limit + 1) return false;
							if ($groupByArr) {
								$isOnSameGroup = true;
								foreach ($groupByArr as $groupBy) {
									if (is_object($columns[$groupBy]) && $columns[$groupBy] instanceof Closure) {
				    					$thisGroupByData[$groupBy] = $columns[$groupBy]($result);
				    				} else {
				    					$thisGroupByData[$groupBy] = $result->{$columns[$groupBy]};
				    				}


				    				if (isset($currentGroupByData[$groupBy])) {
				    					if ($thisGroupByData[$groupBy] != $currentGroupByData[$groupBy]) {
				    						$isOnSameGroup = false;
				    					}
				    				}

				    				$currentGroupByData[$groupBy] = $thisGroupByData[$groupBy];
				    			}

				    			if ($isOnSameGroup === false) {
		    						echo '<tr class="bg-black f-white">';
		                            if ($showNumColumn || $grandTotalSkip > 1) {
		                                echo '<td colspan="' . $grandTotalSkip . '"><b>Grand Total</b></td>';
		                            }
									$dataFound = false;
	    							foreach ($columns as $colName => $colData) {
	    								if (array_key_exists($colName, $showTotalColumns)) {
	    									if ($showTotalColumns[$colName] == 'point') {
	    										echo '<td class="right"><b>' . number_format($total[$colName], 2, '.', ',') . '</b></td>';
	    									} else {
	    										echo '<td class="right"><b>' . strtoupper($showTotalColumns[$colName]) . ' ' . number_format($total[$colName], 2, '.', ',') . '</b></td>';
	    									}
	    									$dataFound = true;
	    								} else {
	    									if ($dataFound) {
		    									echo '<td></td>';
		    								}
	    								}
	    							}
		    						echo '</tr>';

									// Reset No, Reset Grand Total
		    						$no = 1;
		    						foreach ($showTotalColumns as $showTotalColumn => $type) {
		    							$total[$showTotalColumn] = 0;
		    						}
		    						$isOnSameGroup = true;
		    					}
			    			}
						?>
			    		<tr align="center" class="<?php echo e(($no % 2 == 0) ? 'even' : 'odd'); ?>">
			    			<?php if($showNumColumn): ?>
								<td class="left"><?php echo e($no); ?></td>
							<?php endif; ?>
			    			<?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colName => $colData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    				<?php
				    				$class = 'left';
				    				// Check Edit Column to manipulate class & Data
				    				if (is_object($colData) && $colData instanceof Closure) {
				    					$generatedColData = $colData($result);
				    				} else {
				    					$generatedColData = $result->{$colData};
				    				}
				    				$displayedColValue = $generatedColData;
				    				if (array_key_exists($colName, $editColumns)) {
				    					if (isset($editColumns[$colName]['class'])) {
				    						$class = $editColumns[$colName]['class'];
				    					}

				    					if (isset($editColumns[$colName]['displayAs'])) {
				    						$displayAs = $editColumns[$colName]['displayAs'];
					    					if (is_object($displayAs) && $displayAs instanceof Closure) {
					    						$displayedColValue = $displayAs($result);
					    					} elseif (!(is_object($displayAs) && $displayAs instanceof Closure)) {
					    						$displayedColValue = $displayAs;
					    					}
					    				}
				    				}

				    				if (array_key_exists($colName, $showTotalColumns)) {
				    					$total[$colName] += $generatedColData;
				    				}
			    				?>
			    				<td class="<?php echo e($class); ?>"><?php echo e($displayedColValue); ?></td>
			    			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    		</tr>
		    			<?php $ctr++; $no++; ?>
		    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		            <?php
		            if ($applyFlush) flush();
		            });
		            ?>
					<?php if($showTotalColumns != [] && $ctr > 1): ?>
						<tr class="bg-black f-white">
                            <?php if($showNumColumn || $grandTotalSkip > 1): ?>
                                <td colspan="<?php echo e($grandTotalSkip); ?>"><b>Grand Total</b></td> 
                            <?php endif; ?>
							<?php $dataFound = false; ?>
							<?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colName => $colData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if(array_key_exists($colName, $showTotalColumns)): ?>
									<?php $dataFound = true; ?>
									<?php if($showTotalColumns[$colName] == 'point'): ?>
										<td class="right"><b><?php echo e(number_format($total[$colName], 2, '.', ',')); ?></b></td>
									<?php else: ?>
										<td class="right"><b><?php echo e(strtoupper($showTotalColumns[$colName])); ?> <?php echo e(number_format($total[$colName], 2, '.', ',')); ?></b></td>
									<?php endif; ?>
								<?php else: ?>
									<?php if($dataFound): ?>
										<td></td>
									<?php endif; ?>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tr>
					<?php endif; ?>
		    	</table>
			</div>
		</div>
	    <script type="text/php">
	    	<?php if(strtolower($orientation) == 'portrait'): ?>
	        if ( isset($pdf) ) {
	            $pdf->page_text(30, ($pdf->get_height() - 26.89), "Date Printed: " . date('d M Y H:i:s'), null, 10);
	        	$pdf->page_text(($pdf->get_width() - 84), ($pdf->get_height() - 26.89), "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10);
	        }
		    <?php elseif(strtolower($orientation) == 'landscape'): ?>
		    if ( isset($pdf) ) {
		        $pdf->page_text(30, ($pdf->get_height() - 26.89), "Date Printed: " . date('d M Y H:i:s'), null, 10);
		    	$pdf->page_text(($pdf->get_width() - 84), ($pdf->get_height() - 26.89), "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10);
		    }
		    <?php endif; ?>
	    </script>
	</body>
</html>
