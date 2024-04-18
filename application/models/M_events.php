<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_events extends CI_Model
{
    function getDataevents()
    {
        $query = $this->db->get('events');
        return $query->result();
    }

    function insertDataevents($data)
    {
        $this->db->insert('events', $data);
    }

    function getDataeventsDetail($id)
    {
        $this->db->where('event_id', $id);
        $query =  $this->db->get('events');
        return $query->row();
    }

    function updateDataevents($id, $data)
    {
        $this->db->where('event_id', $id);
        $this->db->update('events', $data);
    }

    function hapusEvents($id)
    {
        $this->db->where('event_id', $id);
        $this->db->delete('events');
    }
    // function getDatakategori()
    // {
    //     $query = $this->db->get('kategori');
    //     return $query->result();
    // }
    

}