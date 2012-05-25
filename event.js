document.getElementById('main').onload = start;

document.getElementById('btn_hash').onclick = action_btn_hash;
document.getElementById('btn_crack').onclick = action_btn_crack;
document.getElementById('btn_history').onclick = action_btn_history;

document.getElementById('zone_hash_text').onkeyup = behavior_zone_hash;
document.getElementById('zone_hash_type_hash').onchange = behavior_zone_hash;
document.getElementById('zone_hash_btn_all').onclick = behavior_zone_hash_btn_all;
document.getElementById('zone_hash_btn_none').onclick = behavior_zone_hash_btn_none;
document.getElementById('zone_hash_btn_hash').onclick = behavior_zone_hash_btn_hash;

document.getElementById('zone_crack_text').onkeyup = behavior_zone_crack_text;
document.getElementById('zone_crack_type_hash').onchange = behavior_zone_crack;
document.getElementById('zone_crack_btn_all').onclick = behavior_zone_crack_btn_all;
document.getElementById('zone_crack_btn_none').onclick = behavior_zone_crack_btn_none;
document.getElementById('zone_crack_btn_crack').onclick = behavior_zone_crack_btn_crack;