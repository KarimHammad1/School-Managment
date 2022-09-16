<?php

namespace App\Providers;

use App\Repository\FeeInvoicesRepository;
use App\Repository\FeeInvoicesRepositoryInterface;
use App\Repository\FeesRepository;
use App\Repository\FeesRepositoryInterface;
use App\Repository\ProcessingFeeRepository;
use App\Repository\ReceiptStudentsRepository;
use App\Repository\ReceiptStudentsRepositoryInterface;
use App\Repository\StudentGraduatedRepository;
use App\Repository\StudentGraduatedRepositoryInterface;
use App\Repository\StudentPromotionRepository;
use App\Repository\StudentPromotionRepositoryInterface;
use App\Repository\StudentRepository;
use App\Repository\StudentRepositoryInterface;
use App\Repository\TeacherRepository;
use App\Repository\TeacherRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(StudentPromotionRepositoryInterface::class, StudentPromotionRepository::class);
        $this->app->bind(StudentGraduatedRepositoryInterface::class, StudentGraduatedRepository::class);
        $this->app->bind(FeesRepositoryInterface::class, FeesRepository::class);
        $this->app->bind(FeeInvoicesRepositoryInterface::class, FeeInvoicesRepository::class);
        $this->app->bind(ReceiptStudentsRepositoryInterface::class, ReceiptStudentsRepository::class);
        $this->app->bind('App\Repository\ProcessingFeeRepositoryInterface', 'App\Repository\ProcessingFeeRepository');
        $this->app->bind('App\Repository\PaymentRepositoryInterface', 'App\Repository\PaymentRepository');
        $this->app->bind('App\Repository\AttendanceRepositoryInterface', 'App\Repository\AttendanceRepository');
        $this->app->bind('App\Repository\SubjectRepositoryInterface', 'App\Repository\SubjectRepository');
        $this->app->bind('App\Repository\QuizzRepositoryInterface', 'App\Repository\QuizzRepository');
        $this->app->bind('App\Repository\QuestionRepositoryInterface', 'App\Repository\QuestionRepository');
        $this->app->bind('App\Repository\LibraryRepositoryInterface', 'App\Repository\LibraryRepository');
    }


    public function boot()
    {

    }
}
