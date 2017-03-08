<!DOCTYPE html>
<html>
<head>
	<title>Cash Voucher Report</title>
	<style>
		html {
			font-family: 'Tahoma',sans-serif;
		}

		span {
			font-size: 10px;
		}

		td {
			font-size: 9px;
		}

		.hidden {
			color: transparent;
		}
	</style>
	<script>
		(function(){
			window.print();
		})();
	</script>
</head>
<body>
	<strong>
	<span style="position: absolute; left: 125px; top: 42px;"><?php echo $journal_info->supplier_name; ?></span>
	<span style="position: absolute; right: 50px; top: 42px;"><?php echo $journal_info->date_txn; ?></span>
	<span style="position: absolute; left: 125px; top: 54px;"><?php echo $journal_info->amount; ?></span>
	<span style="position: absolute; left: 170px; top: 210px;"><?php echo $journal_info->remarks; ?></span>
	<span style="position: absolute; left: 170px; top: 245px;"><?php echo $journal_info->bank; ?></span>
	<span style="position: absolute; left: 170px; top: 258px;"><?php echo $journal_info->check_date; ?></span>
	<span style="position: absolute; left: 170px; top: 270px;"><?php echo $journal_info->check_no; ?></span>
	</strong>

	<table style="position: absolute; left: 30px; top: 75px;" width="100%">
	<?php foreach($journal_accounts as $account){ ?>
        <tr>
            <td width="45%" style="padding: 0;"><?php echo $account->account_title; ?></td>
            <td width="16%" style="padding: 0;" align="right"><?php echo number_format($account->dr_amount,2); ?></td>
            <td width="17%" style="padding: 0;" align="right"><?php echo number_format($account->cr_amount,2); ?></td>
        </tr>

    <?php   } 	?>
    </table>
</body>
</html>