<?php
// api.php
header('Content-Type: application/json; charset=utf-8');

$method = $_SERVER['REQUEST_METHOD'];

$playlists = [
    [
        "id" => 1,
        "title" => "Morning Vibes",
        "owner" => "Maria",
        "albums" => [
            [
                "album_id" => 101,
                "title" => "Acoustic Sunrise",
                "tracks" => [
                    ["track_id" => 1001, "title" => "Sunrise Song", "duration" => "3:45"],
                    ["track_id" => 1002, "title" => "Coffee Beats", "duration" => "4:12"]
                ]
            ]
        ]
    ]
];

function find_playlist_by_id($list, $id) {
    foreach ($list as $pl) {
        if ($pl['id'] == $id) return $pl;
    }
    return null;
}

$action = isset($_GET['action']) ? $_GET['action'] : 'list';

$response = [
    "status" => "ok",
    "time" => date(DATE_ATOM),
    "data" => null
];

if ($method === 'GET') {
    if ($action === 'list') {
        $response['data'] = $playlists;
    } elseif ($action === 'get' && isset($_GET['id'])) {
        $pl = find_playlist_by_id($playlists, intval($_GET['id']));
        if ($pl) {
            $response['data'] = $pl;
        } else {
            http_response_code(404);
            $response['status'] = 'error';
            $response['message'] = 'Not found';
        }
    }
} else {
    http_response_code(405);
}

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
