<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConnectionRequest;
use App\Http\Resources\ConnectionResource;
use App\Models\Connection;

class ConnectionController extends Controller
{

    public function sendConnection(ConnectionRequest $request)
    {
        if (Connection::where(function ($query) use ($request) {
            $query->where('sender_id', $request->sender_id)
                ->where('received_id', $request->received_id);
        })->orWhere(function ($query) use ($request) {
            $query->where('sender_id', $request->received_id)
                ->where('received_id', $request->sender_id);
        })->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Connection already exists'
            ]);
        } else {
            $connection =  Connection::create([
                'sender_id' => $request->sender_id,
                'received_id' => $request->received_id,
            ]);
        }
        if ($connection) {
            return response()->json([
                'success' => true,
                'message' => 'Connection Sent'
            ]);
        }
    }

    public function getConnections($id)
    {
        $connections = Connection::with('sender')->where('received_id', $id)->get();
        return ConnectionResource::collection($connections);
    }

    public function acceptConnection($id)
    {
        $connection = Connection::findOrFail($id);
        $connection->status = 'accepted';
        $connection->save();
        return response()->json([
            'success' => true,
            'message' => 'Connection accepted',
        ]);
    }

    public function destroy($id)
    {
        $connection = Connection::findOrFail($id);
        $connection->delete();
        return response()->json([
            'success' => true,
            'message' => 'Connection deleted',
        ]);
    }
}
