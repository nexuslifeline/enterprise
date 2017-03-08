<!DOCTYPE html>
<html>
<head>
    <title>Cash Disbursement</title>
    <style type="text/css">
        body {
            font-family: 'Calibri',sans-serif;
            font-size: 12px;
        }

        .align-right {
            text-align: right;
        }

        .align-left {
            text-align: left;
        }

        .data {
            border-bottom: 1px solid #404040;
        }

        .align-center {
            text-align: center;
        }

        .report-header {
            font-weight: bolder;
        }

        hr {
            border-top: 3px solid #404040;
        }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <td width="10%"><img src="<?php echo $company_info->logo_path; ?>" style="height: 90px; width: 120px; text-align: left;"></td>
            <td width="90%" class="align-center">
                <h1 class="report-header"><strong><?php echo $company_info->company_name; ?></strong></h1>
                <p><?php echo $company_info->company_address; ?></p>
                <p><?php echo $company_info->landline.'/'.$company_info->mobile_no; ?></p>
            </td>
        </tr>
    </table><hr>
    <div class="">
        <h3 class="report-header"><strong>CASH DISBURSEMENT</strong></h3>
    </div>
    <table width="100%" cellspacing="-1">
        <tr style="padding: 20px;">
            <td width="15%" align="right"><strong>Voucher No.:</strong></td>
            <td width="35%" style="padding-left: 10px;"><strong><?php echo $journal_info->ref_no; ?></strong></td>
            <td width="15%" align="right"><strong>Account No.:</strong></td>
            <td width="35%" style="padding-left: 10px;"></td>
        </tr>
        <tr>
            <td width="15%" align="right"><strong>Voucher Date:</strong></td>
            <td width="35%" style="padding-left: 10px;"><strong><?php echo date_format(new DateTime($journal_info->date_txn),"m/d/Y"); ?></strong></td>
            <td width="15%" align="right"><strong>Check No.:</strong></td>
            <td width="35%" style="padding-left: 10px;"><strong><?php echo $journal_info->check_no; ?></strong></td>
        </tr>
        <tr>
            <td width="15%" align="right"><strong>Amount:</strong></td>
            <td width="35%" style="padding-left: 10px;"><strong>***<?php echo number_format($journal_info->amount,2); ?>***</strong></td>
            <td width="15%" align="right"><strong>Check Date:</strong></td>
            <td width="35" style="padding-left: 10px;"><strong></strong></td>
        </tr>
        <tr>
            <td width="15%" align="right"><strong>Amount in words:</strong></td>
            <td width="35%" colspan="3" style="padding-left: 10px;"><strong><i><?php echo $formatted_amount; ?></i></strong></td>
        </tr>
        <tr>
            <td width="20%" align="right"><strong>Payee Name:</strong></td>
            <td colspan="3" style="font-size: 16px; padding-left: 10px;"><strong>***<?php echo $journal_info->supplier_name; ?>***</strong></td>
        </tr>
    </table><br>
    <table cellspacing="-1" width="20%" style="margin-left: 280px;">
        <tr>
            <td style="padding-right: 10px;"><center>______________________________</center></td>
            <td><center>______________________________</center></td>
        </tr>
        <tr>
            <td><center>Received By<br>(Print name and sign)</center></td>
            <td><center>Date</center></td>
        </tr>
    </table>
    <hr>
    <table width="100%" cellspacing="-1">
        <tr style="padding: 20px;">
            <td width="15%" align="right"><strong>Payee Name:</strong></td>
            <td colspan="3" style="font-size: 16px; padding-left: 10px;"><strong>***<?php echo $journal_info->supplier_name; ?>***</strong></td>
        </tr>
        <tr>
            <td width="15%" align="right"><strong>Voucher No.:</strong></td>
            <td width="35%" style="padding-left: 10px;"><strong><?php echo $journal_info->ref_no; ?></strong></td>
            <td width="15%" align="right"><strong>Voucher Date:</strong></td>
            <td width="35%" style="padding-left: 10px;"><strong><?php echo date_format(new DateTime($journal_info->date_txn),"m/d/Y"); ?></strong></td>
        </tr>
        <tr>
            <td width="15%" align="right"><strong>Account No.:</strong></td>
            <td width="35%" style="padding-left: 10px;"><strong></strong></td>
            <td width="15%" align="right"><strong>Tax Code:</strong></td>
            <td width="35" style="padding-left: 10px;"><strong></strong></td>
        </tr>
        <tr>
            <td width="15%" align="right"><strong>Check No.:</strong></td>
            <td width="35%" style="padding-left: 10px;"><strong><?php echo $journal_info->check_no; ?></strong></td>
            <td width="15%" align="right"><strong>Batch No.:</strong></td>
            <td width="35%" style="padding-left: 10px;"><strong></strong></td>
        </tr>
        <tr>
            <td width="15%" align="right"><strong>Amount:</strong></td>
            <td colspan="3" style="padding-left: 10px; font-size: 16px;"><strong>***<?php echo number_format($journal_info->amount,2); ?>***</strong></td>
        </tr>
        <tr>
            <td width="20%" align="right"><strong>Purpose of Check:</strong></td>
            <td colspan="3" style="padding-left: 10px;"><i><?php echo $journal_info->remarks; ?></i></td>
        </tr>
    </table><br>
    <table width="100%" style="border-collapse: collapse;border-spacing: 0;font-family: tahoma;font-size: 11" border="0">
            <thead>
            <tr>
<!--                <th width="10%" style="border: 1px solid black;text-align: left;height: 30px;padding: 6px;">Account #</th>-->
                <th width="30%" style="border: 1px solid black;text-align: left;padding: 4px;">Account</th>
                <th width="30%" style="border: 1px solid black;text-align: right;padding: 4px;">Memo</th>
                <th width="15%" style="border: 1px solid black;text-align: right;padding: 4px;">Debit</th>
                <th width="15%" style="border: 1px solid black;text-align: right;padding: 4px;">Credit</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $dr_amount=0.00; $cr_amount=0.00;

            foreach($journal_accounts as $account){

                ?>
                <tr>
<!--                    <td width="30%" style="border: 1px solid black;text-align: left;height: 30px;padding: 6px;">--><?php //echo $account->account_no; ?><!--</td>-->
                    <td width="30%" style="border: 1px solid black;text-align: left;padding: 2px;"><?php echo $account->account_title; ?></td>
                    <td width="30%" style="border: 1px solid black;text-align: right;padding: 2px;"><?php echo $account->memo; ?></td>
                    <td width="15%" style="border: 1px solid black;text-align: right;padding: 2px;"><?php echo number_format($account->dr_amount,2); ?></td>
                    <td width="15%" style="border: 1px solid black;text-align: right;padding: 2px;"><?php echo number_format($account->cr_amount,2); ?></td>
                </tr>
                <?php

                $dr_amount+=$account->dr_amount;
                $cr_amount+=$account->cr_amount;

            }

            ?>

            </tbody>
                <tfoot>
                    <tr style="border: 1px solid black;">
                        <td colspan="4"></td>
                    </tr>
                    <tr style="border: 1px solid black;">
                        <td style="border: 1px solid black;text-align: left;height: 30px;padding: 6px;"></td>
                        <td style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;" align="right"><strong>Total : </strong></td>
                        <td style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;" align="right"><strong><?php echo number_format($dr_amount,2); ?></strong></td>
                        <td style="border: 1px solid black;text-align: right;height: 30px;padding: 6px;" align="right"><strong><?php echo number_format($cr_amount,2); ?></strong></td>
                    </tr>
                    <tr style="border: 1px solid black;">
                        <td colspan="2" style="border: 1px solid black;text-align: left;height: 30px;padding: 6px;"></td>
                        <td colspan="2" style="border: 1px solid black;text-align: left;height: 30px;padding: 6px;"></td>
                    </tr>
                </tfoot>    
        </table><br><br>
        <center>
            <table style="text-align: center;">
                <tr>
                    <td width="30%" style="padding-right: 10px;">___________________________________</td>
                    <td width="30%" style="padding-right: 10px;">___________________________________</td>
                    <td width="30%" style="padding-right: 10px;">___________________________________</td>
                </tr>
                <tr>
                    <td width="30%" style="padding-right: 10px;"><strong>PREPARED BY / PRINTED BY</strong></td>
                    <td width="30%" style="padding-right: 10px;"><strong>CHECKED BY</strong></td>
                    <td width="30%" style="padding-right: 10px;"><strong>APPROVED BY</strong></td>
                </tr>
            </table>
        </center>
</body>
</html>




















