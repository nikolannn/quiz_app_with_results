<!DOCTYPE html>
<html>
<head>
    <title>Choose a Quiz Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --dark-bg: #0f0f23;
            --card-bg: rgba(255, 255, 255, 0.05);
            --card-border: rgba(255, 255, 255, 0.1);
            --text-primary: #ffffff;
            --text-secondary: #a0a0a0;
            --accent-color: #00d4ff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background: var(--dark-bg);
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(120, 219, 255, 0.3) 0%, transparent 50%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-primary);
            overflow-x: hidden;
        }

        .main-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
        }

        .content-wrapper {
            max-width: 800px;
            width: 100%;
            position: relative;
            z-index: 2;
        }

        .title {
            font-size: 3rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 3rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: titleGlow 3s ease-in-out infinite alternate;
        }

        @keyframes titleGlow {
            0% { filter: drop-shadow(0 0 20px rgba(102, 126, 234, 0.5)); }
            100% { filter: drop-shadow(0 0 30px rgba(118, 75, 162, 0.8)); }
        }

        .categories-grid {
            display: grid;
            gap: 1.5rem;
            list-style: none;
        }

        .category-card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            padding: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .category-card:hover::before {
            left: 100%;
        }

        .category-card:hover {
            transform: translateY(-10px) scale(1.02);
            background: rgba(255, 255, 255, 0.1);
            border-color: var(--accent-color);
            box-shadow: 
                0 20px 40px rgba(0, 212, 255, 0.2),
                0 0 0 1px rgba(0, 212, 255, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        .category-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .category-icon {
            width: 60px;
            height: 60px;
            background: var(--primary-gradient);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            transition: all 0.3s ease;
        }

        .category-card:hover .category-icon {
            transform: rotate(360deg) scale(1.1);
            background: var(--secondary-gradient);
        }

        .category-name {
            font-size: 1.4rem;
            font-weight: 600;
            margin: 0;
            color: var(--text-primary);
        }

        .start-btn {
            background: var(--primary-gradient);
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            color: white;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
        }

        .start-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--secondary-gradient);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .start-btn:hover::before {
            left: 0;
        }

        .start-btn:hover {
            transform: translateX(5px);
            color: white;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .start-btn:hover i {
            transform: translateX(5px);
        }

        .no-categories {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            color: var(--text-secondary);
            font-size: 1.2rem;
        }

        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .shape {
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) { top: 20%; left: 10%; animation-delay: 0s; }
        .shape:nth-child(2) { top: 60%; right: 10%; animation-delay: 2s; }
        .shape:nth-child(3) { bottom: 20%; left: 20%; animation-delay: 4s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        @media (max-width: 768px) {
            .title { font-size: 2rem; margin-bottom: 2rem; }
            .category-card { flex-direction: column; gap: 1.5rem; text-align: center; }
            .main-container { padding: 1rem; }
        }
    </style>
</head>
<body>

    <div class="floating-shapes">
        <div class="shape"><i class="fas fa-brain" style="font-size: 3rem; color: #667eea;"></i></div>
        <div class="shape"><i class="fas fa-lightbulb" style="font-size: 2.5rem; color: #f093fb;"></i></div>
        <div class="shape"><i class="fas fa-trophy" style="font-size: 3.5rem; color: #00d4ff;"></i></div>
    </div>

    <div class="main-container">
        <div class="content-wrapper">
            <h1 class="title">Choose Your Challenge</h1>

            @if($categories->count())
                <ul class="categories-grid">
                    @foreach($categories as $category)
                        <li class="category-card">
                            <div class="category-info">
                                <div class="category-icon">
                                    <i class="fas fa-puzzle-piece"></i>
                                </div>
                                <h3 class="category-name">{{ $category->name }}</h3>
                            </div>
                            <a href="{{ route('quiz.start', $category->id) }}" class="start-btn">
                                Start Quiz <i class="fas fa-arrow-right"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="no-categories">
                    <i class="fas fa-search" style="font-size: 3rem; margin-bottom: 1rem; display: block;"></i>
                    No categories found. Check back soon for exciting quizzes!
                </div>
            @endif

            <div class="text-center mt-5">
                <button class="start-btn" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                    <i class="fas fa-plus-circle"></i> Create Category
                </button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white" style="border-radius: 20px; border: 1px solid var(--card-border); backdrop-filter: blur(20px); background-color: rgba(255,255,255,0.05);">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="createCategoryModalLabel" style="color: var(--accent-color);">New Category</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('category.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label" style="color: var(--text-secondary);">Category Name</label>
                            <input type="text" class="form-control bg-transparent text-white border-0" id="categoryName" name="name" required style="border-radius: 12px; padding: 12px; background-color: rgba(255,255,255,0.05);">
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="start-btn">
                            <i class="fas fa-check-circle"></i> Save Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
