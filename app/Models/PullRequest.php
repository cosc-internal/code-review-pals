<?php

namespace App\Models;

use App\Enums\PullRequest\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PullRequest extends Model
{
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = ['node_id', 'repository', 'title', 'html_url', 'status', 'description', 'user_id'];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'status' => Status::class,
    ];

    /**
     * @return BelongsTo<User, PullRequest>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
