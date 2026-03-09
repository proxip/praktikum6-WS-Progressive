<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Post</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .post-card {
            background: white;
            border-radius: 24px;
            padding: 50px;
            width: 100%;
            max-width: 640px;
            box-shadow: 0 25px 80px rgba(0,0,0,0.2);
        }
        .post-header {
            margin-bottom: 30px;
        }
        .post-meta {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        .post-id {
            background: #f1f5f9;
            color: #64748b;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
        }
        .status {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .status.active {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }
        .status.inactive {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }
        .post-year {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .post-title {
            font-size: 32px;
            font-weight: 700;
            color: #1e293b;
            line-height: 1.3;
        }
        .post-author {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #64748b;
            font-size: 15px;
        }
        .post-author svg {
            width: 18px;
            height: 18px;
        }
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
            margin: 30px 0;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 16px 0;
            border-bottom: 1px solid #f1f5f9;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .detail-label {
            color: #94a3b8;
            font-size: 14px;
            font-weight: 500;
        }
        .detail-value {
            color: #334155;
            font-weight: 600;
            font-size: 15px;
        }
        .actions {
            display: flex;
            gap: 12px;
            margin-top: 35px;
            padding-top: 30px;
            border-top: 1px solid #f1f5f9;
        }
        .btn {
            flex: 1;
            padding: 16px 24px;
            border: none;
            border-radius: 14px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 20px rgba(102, 126, 234, 0.4);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(102, 126, 234, 0.5);
        }
        .btn-secondary {
            background: #f1f5f9;
            color: #64748b;
        }
        .btn-secondary:hover {
            background: #e2e8f0;
        }
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 20px;
            opacity: 0.9;
            transition: opacity 0.2s;
        }
        .back-link:hover { opacity: 1; }
        .wrapper {
            width: 100%;
            max-width: 640px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <a href="{{ route('posts.index') }}" class="back-link">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Posts
        </a>

        <div class="post-card">
            <div class="post-header">
                <div class="post-meta">
                    <span class="post-id">Post #{{ $post->id }}</span>
                    <span class="status {{ $post->is_active ? 'active' : 'inactive' }}">
                        {{ $post->is_active ? 'Published' : 'Draft' }}
                    </span>
                    <span class="post-year">{{ $post->year }}</span>
                </div>
                <h1 class="post-title">{{ $post->title }}</h1>
                <div class="post-author" style="margin-top: 15px;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span>By {{ $post->author }}</span>
                </div>
            </div>

            <div class="divider"></div>

            <div class="detail-row">
                <span class="detail-label">Post ID</span>
                <span class="detail-value">#{{ $post->id }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Title</span>
                <span class="detail-value">{{ $post->title }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Author</span>
                <span class="detail-value">{{ $post->author }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Publication Year</span>
                <span class="detail-value">{{ $post->year }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Status</span>
                <span class="detail-value">
                    <span class="status {{ $post->is_active ? 'active' : 'inactive' }}">
                        {{ $post->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Created</span>
                <span class="detail-value">{{ $post->created_at->format('M d, Y - H:i') }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Last Updated</span>
                <span class="detail-value">{{ $post->updated_at->format('M d, Y - H:i') }}</span>
            </div>

            <div class="actions">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit Post
                </a>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</body>
</html>
