// 定数(X座標)の宣言
const X_Start  = 0;
const X_Middle = 55;
const X_End    = 10;


function input_team_passer()
{
    $input_pass_num_ = fgets( STDIN );
    $input_pass_num  = explode( " ", $input_pass_num_);    

        return $input_pass_num;
}

function input_num()
{
    $input_array_s_ = fgets( STDIN );
    $input_array  = explode( " ", $input_array_s_ );

        return $input_array;
}

//string型からint型へキャスト
function string_to_int( $input_s )
{
    for($a = 0; $a < count( $input_s ); $a ++)
    {
        //$input_A_p[$a] = (int)($input_A_p_s[$a]);
        $input_i[$a] = ( int )($input_s[$a] );
    }   
        return $input_i;
}


//パスを出した選手が一番先頭にいるか判定(この場合はオフサイドではない)
function check_front_A( $input_A_p_, $most_front_A_, $pass_palyer_ )
{
    $result_A_ = 0;
    
    if( $input_A_p_[$pass_palyer_ -1] == $most_front_A_ )
    {
        $result_A_ = 1;
    }
        return $result_A_;
}

//パスを出した選手が一番先頭にいるか判定(この場合はオフサイドではない)
function check_front_B( $input_B_p_, $most_front_B_, $pass_palyer_ )
{ 
    $result_B_ = 0;

    if(  $input_B_p_[$pass_palyer_ -1] == $most_front_B_ )
    {
            $result_B_ = 1;
    }
        return $result_B_;
}

//  OK チームAの選手全員が自分の陣地にいる場合はオフサイドにしない
function check_myArea_stay_A($input_A_p_)
{
    //オフサイドかどうかの判定用
    $result_A    = 0;
    $num_area_in = 0;
    
    for( $i = 0; $i < count( $input_A_p_ ); $i ++)
    {   
         //  OK チームAの選手全員が自分の陣地にいる場合はオフサイドにしない
        if( ($input_A_p_[$i] >= X_Start ) && ( $input_A_p_[$i] <= X_Middle ) )
        {
            $num_area_in =+ 1;
            //echo "@1";
        
            if($num_area_in == count( $input_A_p_ ))
            {
                $result_A = 1;
                //echo "@2";
            }
        }
    }
        return $result_A;
}

//  OK チームAの選手全員が自分の陣地にいる場合はオフサイドにしない
function check_myArea_stay_B($input_B_p_)
{
    //オフサイドかどうかの判定用
    $result_B    = 0;
    $num_area_in = 0;
    
    for( $i = 0; $i < count( $input_B_p_ ); $i ++)
    {   
         //  OK チームAの選手全員が自分の陣地にいる場合はオフサイドにしない
        if( ($input_B_p_[$i] >= X_Middle ) && ( $input_B_p_[$i] <= X_End ) )
        {
            $num_area_in = $num_area_in + 1;
        
            if($num_area_in == count( $input_B_p_ ) )
            {
                $result_B = 1;
            }
        }
    }
        return $result_B;
}


// Offsideの人を調べる
function check_offsider_A( $input_A_p_, $sort_B_p_, $pass_palyer_ )
{
    $num_offsider = 0;
    $result_A     = 0;

    for( $j = 0; $j < count( $input_A_p_ ); $j ++)
    {
        if( ($sort_B_p_[1] < $input_A_p_[$j]) && ( $j != $pass_palyer_ -1 ) )
        {
            $num_offsider += 1;
            echo $j + 1;
            echo (PHP_EOL);
        }            
    }
    //自分の陣地ではないが一人もオフサイドエリアにいない場合
    if( $num_offsider == 0)
    {
        $result_A = 1;
        //echo "@3";
    }
        return $result_A;
}

// Offsideの人を調べる
function check_offsider_B( $input_B_p_, $sort_A_p_, $pass_palyer_ )
{
    $num_offsider = 0;
    $result_B     = 0;
    
    for( $j = 0; $j < count( $input_B_p_ ); $j ++)
    {
        if( ($sort_A_p_[1] > $input_B_p_[$j]) && ( $j != $pass_palyer_ -1 ) )
        {                    
            $num_offsider += 1;
            echo $j + 1;
            echo (PHP_EOL);
        }            
    }
    //自分の陣地ではないが一人もオフサイドエリアにいない場合
    if( $num_offsider == 0)
    {
        $result_B = 1;
    }
        return $result_B;
}

function show_result($result_)
{
    switch ($result_)
    {
        case 1:
            echo "None";
            echo (PHP_EOL);
            break;
        
        default:
            break;
    }
}

// ---------------- 以下 Main文 -------------------//

// 最初にチーム名(A or B)とパスを出す選手を入力
$input_pass_num = input_team_passer();

// 標準入力でAチームとBチームの全選手X座標を入力
$input_A_p_s = input_num();
$input_B_p_s = input_num();

// キャスト 引数は配列
$input_A_p = string_to_int( $input_A_p_s );
$input_B_p = string_to_int( $input_B_p_s );

// Noneを返す用の変数
// パスを出す選手がチームAの場合
if( $input_pass_num[0] == 'A' )
{
    $most_front_A = max( $input_A_p );
    rsort( $input_B_p, SORT_NUMERIC );
    
    $sort_B_p    = $input_B_p;
    $pass_palyer = $input_pass_num[1];

    // (ケース1) NOT Offside パス出す人が先頭の場合
    $result = check_front_A( $input_A_p ,$most_front_A, $pass_palyer );
    
    // (ケース2) NOT Offside 全員自分のエリア内
    $result = check_myArea_stay_A($input_A_p);
    
    // オフサイドのプレイヤー人数のチェックと表示
    $result = check_offsider_A( $input_A_p, $sort_B_p, $pass_palyer );        

    // 結果を表示する
    show_result($result);
}


if($input_pass_num[0] == 'B')
{
    $most_front_B = min( $input_B_p );
    sort($input_A_p, SORT_NUMERIC);
    
    $sort_A_p    = $input_A_p;
    $pass_palyer = $input_pass_num[1];

    // (ケース1) NOT Offside パス出す人が先頭の場合
    $result = check_front_B( $input_B_p ,$most_front_B, $pass_palyer );

     // (ケース2) NOT Offside 全員自分のエリア内
    $result = check_myArea_stay_B($input_B_p);

     // オフサイドのプレイヤー人数のチェックと表示
    $result = check_offsider_B( $input_B_p, $sort_A_p, $pass_palyer );
    
    // 結果を表示する
    show_result($result);
}

/* 実行結果
B 7
86 36 55 88 10 82 53 107 83 22 15
69 38 48 73 21 50 27 1 41 24 103
8
*/
