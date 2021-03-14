<?php
class Participants extends Model{
    var $table="member_activity inner join member on member_activity.id_member = member.id";
}