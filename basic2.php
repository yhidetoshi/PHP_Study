$in_m_p_q =fgets(STDIN);
$m_p_q = explode(" ",$in_m_p_q);

$buff = ((float)$m_p_q[0]) - ((float)$m_p_q[1]/100)*(float)$m_p_q[0];
echo $buff - ($buff * (float)$m_p_q[2]/100);
echo(PHP_EOL);

/* 実行結果
$in_m_p_q =fgets(STDIN);
$m_p_q = explode(" ",$in_m_p_q);

$buff = ((float)$m_p_q[0]) - ((float)$m_p_q[1]/100)*(float)$m_p_q[0];
echo $buff - ($buff * (float)$m_p_q[2]/100);
echo(PHP_EOL);
*/
