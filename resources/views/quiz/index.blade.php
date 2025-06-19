@extends('layouts.app')

@section('content')
    <div class="floating-shapes">
        <div class="shape">
            <i class="fas fa-brain" style="font-size: 3rem; color: #667eea;"></i>
        </div>
        <div class="shape">
            <i class="fas fa-lightbulb" style="font-size: 2.5rem; color: #f093fb;"></i>
        </div>
        <div class="shape">
            <i class="fas fa-trophy" style="font-size: 3.5rem; color: #00d4ff;"></i>
        </div>
    </div>

    <div class="main-container">
        <div class="content-wrapper">
            <h1 class="title">Choose Category</h1>
            
            @if($categories->count())
            <div class="mb-4 d-flex justify-content-start">
    <a href="{{ route('home') }}" class="back-home-btn">
        <i class="fas fa-home me-2"></i>Back to Homepage
    </a>
</div>

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
                                Start Quiz
                                <i class="fas fa-arrow-right"></i>
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

            <!-- What can you do section -->
            <section class="info-section">
                <h2>What can you do?</h2>
                <p>Explore different quiz categories and test your knowledge.</p>
                <p>Each quiz is designed to challenge and enhance your understanding.</p>
                <p>Goodluck and get interested! (please)</p>
            </section>
        </div>
    </div>

    <style>
        /* Updated button style matching index */
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
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            font-size: 1rem;
            user-select: none;
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
            border-radius: 50px;
        }

        .start-btn:hover::before {
            left: 0;
        }

        .start-btn:hover {
            transform: translateX(5px);
            color: white;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.5);
        }

        .start-btn i {
            transition: transform 0.3s ease;
        }

        .start-btn:hover i {
            transform: translateX(5px);
        }

        /* What can you do section styling */
        .info-section {
            margin-top: 3rem;
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            padding: 2rem;
            color: var(--text-primary);
            font-size: 1.1rem;
            line-height: 1.6;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.05);
        }

        .info-section h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .info-section p {
            margin-bottom: 1rem;
            color: var(--text-secondary);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .start-btn {
                padding: 10px 25px;
                font-size: 0.9rem;
            }

            .info-section {
                font-size: 1rem;
                padding: 1.5rem;
            }

            .info-section h2 {
                font-size: 1.5rem;
            }
            .back-home-btn {
    background: var(--secondary-gradient);
    border: none;
    padding: 10px 20px;
    border-radius: 50px;
    color: white;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(240, 147, 251, 0.3);
}

.back-home-btn:hover {
    background: linear-gradient(to right, #667eea, #764ba2);
    transform: scale(1.03);
    box-shadow: 0 6px 18px rgba(102, 126, 234, 0.4);
}

        }
    </style>
@endsection
