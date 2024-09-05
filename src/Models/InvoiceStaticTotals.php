<?php
namespace Einvoicing\Models;

use Einvoicing\Invoice;
use Einvoicing\Traits\VatTrait;
use function array_values;

class InvoiceStaticTotals {
    /**
     * Invoice currency code
     * @var string
     */
    public $currency;

    /**
     * VAT accounting currency code
     * @var string|null
     */
    public $vatCurrency = null;

    /**
     * Sum of all invoice line net amounts
     * @var float
     */
    public $netAmount = 0;

    /**
     * Sum of all charges on document level
     * @var float
     */
    public $chargesAmount = 0;

    /**
     * Total VAT amount for the invoice
     * @var float
     */
    public $vatAmount = 0;

    /**
     * Invoice total amount without VAT
     * @var float
     */
    public $taxExclusiveAmount = 0;

    /**
     * Invoice total amount with VAT
     * @var float
     */
    public $taxInclusiveAmount = 0;

    /**
     * The sum of amounts which have been paid in advance
     * @var float
     */
    public $paidAmount = 0;

    /**
     * The amount to be added to the invoice total to round the amount to be paid
     * @var float
     */
    public $roundingAmount = 0;

    /**
     * Total VAT amount in accounting currency
     * @var float|null
     */
    public $customVatAmount = null;

    /**
     * Amount due for payment
     * @var float
     */
    public $payableAmount = 0;


    /**
     * Create instance from invoice
     * @param  Invoice $inv Invoice instance
     * @return self         Totals instance
     */
    static public function fromInvoice(Invoice $inv): InvoiceStaticTotals {
        return $inv->getStaticTotal();
    }
}
