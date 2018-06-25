<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<script src="jquery.min.js"></script>
<title>call you</title>
</head>
<body>
    <input type="text" size=6 id="num" /> <input type="button" value="click me" onclick="call_you()" />
    <audio id="dosome" style="opacity: 0" hidden="true"></audio>
<script>
var MyPlay = {
    _pool:[],
    _index:0,
    _path : 'audio/',
    _prefix:'',
    _postfix: '',
    audio: null,
    init : function(id){
        this._prefix = this._path+ 'qing.mp3';
        this._postfix = this._path+ 'hao.mp3';
        this.audio = document.getElementById(id);
        var that = this;
        this.audio.addEventListener('ended', function () {
            that._index ++;
            if(that._index>=that._pool.length){
                that._index = 0;
                return;
            }            
            that.play();          
        });
        console.log('OK');
    },
    jiaohao: function(num){
        this._pool=[];
        this._index = 0;
        var len=0;
        num +='';
        var nums = num.split('');
        //console.log(nums);
        this._pool.push(this._prefix);
        len = nums.length;
        for(var i=0;i<len;i++){
            this._pool.push(this._path+nums[i]+".mp3");
        }
        this._pool.push(this._postfix);
        this.play();   
    },
    play: function(){
        this.audio.src=this._pool[this._index];
        this.audio.play();
    }
};
MyPlay.init('dosome');
function call_you(){
    var num = $('#num').val();
    MyPlay.jiaohao(num);
    
}
</script>
</body>
</html>
