    <?php

namespace Ecomws\Order;

use Ecomws\Order\Base;

class GetStatusOrder extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'GetStatusOrder';

    /**
     * The string of orderC.
     *
     * @var string
     */
    protected $orderC;


    public function setOrderC($orderC)
    {
        $this->orderC = $orderC;

        return $this;
    }


    public function toArray()
    {
        return [
            'Token' => Self::$token,
            'OrderC' => $this->orderC
        ];
    }

}
