# Vphone
library validation phone number


#import library
copy file Vphone.php in path application/libraries

#load library
`$this->load->library('vphone');`

#example validation phone number

```
$this->vphone->set_phone('09336505170');
$result = $this->vphone->check();

var_dump($result);
```

before or after set_phone 
`$this->vphone->set_type('IR')`

IR is default
You can use `('IR' | 'ir') OR ('IR0098' | 'ir0098') OR ('IR+98' | 'ir+98')`
