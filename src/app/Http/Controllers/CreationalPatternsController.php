<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Creational\AbstractFactory\GuiKitFactory;
use App\DesignPatterns\Creational\Builder\BlogPostBuilder;
use App\DesignPatterns\Creational\Builder\BlogPostManager;
use App\DesignPatterns\Creational\FactoryMethod\Classes\Forms\BootstrapDialogForm;
use App\DesignPatterns\Creational\FactoryMethod\Classes\Forms\SemanticUiDialogForm;
use App\DesignPatterns\Creational\LazyInitialization\LazyInitialization;
use App\DesignPatterns\Creational\Multiton\SimpleMultiton;
use App\DesignPatterns\Creational\Multiton\SimpleMultitonNext;
use App\DesignPatterns\Creational\Prototype\PrototypeDemo;
use App\DesignPatterns\Creational\SimpleFactory\MessengerSimpleFactory;

use App\DesignPatterns\Creational\Singleton\AdvancedSingleton;
use App\DesignPatterns\Creational\Singleton\Contracts\AnotherConnection;
use App\DesignPatterns\Creational\Singleton\LaravelSingleton;
use App\DesignPatterns\Creational\Singleton\SimpleSingleton;
use App\DesignPatterns\Creational\StaticFactory\StaticFactory;

class CreationalPatternsController extends Controller
{
    /**
     * @var GuiFactoryInterface
     */
    private $guiKit;

    /**
     * CreationalPatternsController constructor.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $this->guiKit = (new GuiKitFactory())->getFactory('SemanticUi');
    }

    /**
     *
     */
    public function AbstractFactory()
    {
//        $name = 'Абстрактная фабрика';

        $result[] = $this->guiKit->buildButton()->setColor('white')->draw();
        $result[] = $this->guiKit->buildCheckbox()->toggle()->draw();

        \Debugbar::info($result);

        return view('welcome', ['pattern' => __FUNCTION__]);
    }

    public function FactoryMethod()
    {
//        $name = 'Фабричный метод';

//        $dialogForm = new BootstrapDialogForm();
        $dialogForm = new SemanticUiDialogForm();
        $result = $dialogForm->render();

        \Debugbar::info($result);

        return view('welcome', ['pattern' => __FUNCTION__]);
    }

    public function StaticFactory()
    {
//        $name = 'Статическая фабрика';

        $appMailMessenger = StaticFactory::build('email');
        $appPhoneMessenger = StaticFactory::build('sms');

        \Debugbar::info($appMailMessenger, $appPhoneMessenger);

        return view('welcome', ['pattern' => __FUNCTION__]);
    }

    public function SimpleFactory()
    {
//        $name = 'Простая фабрика';

        $factory = new MessengerSimpleFactory();

        $appMailMessenger = $factory->build('email');
        $appPhoneMessenger = $factory->build('sms');

        \Debugbar::info($appMailMessenger, $appPhoneMessenger);

        return view('welcome', ['pattern' => __FUNCTION__]);
    }

    public function Singleton()
    {
//        $name = 'Одиночка';

        //> Простой способ создания Одиночки
        $result['simpleSingleton1'] = SimpleSingleton::getInstance();
        $result['simpleSingleton1']->setTest('simpleSingleton1');
        $result['simpleSingleton2'] = SimpleSingleton::getInstance();

        $result['>>>  simpleSingleton1 === simpleSingleton2'] = $result['simpleSingleton1'] === $result['simpleSingleton2'];
        //< Простой способ создания Одиночки

        //> Продвинутый способ создания Одиночки
        $result['advancedSingleton1'] = AdvancedSingleton::getInstance();
        $result['advancedSingleton1']->setTest('advancedSingleton1');
        $result['advancedSingleton2'] = AdvancedSingleton::getInstance();

        $result['>>>  advancedSingleton1 === advancedSingleton2'] = $result['advancedSingleton1'] === $result['advancedSingleton2'];
        //< Продвинутый способ создания Одиночки

        //> Laravel-way способ создания Одиночки
        $result['laravelSingleton1'] = app(AnotherConnection::class);
        $result['laravelSingleton1']->setTest('laravelSingleton1');
        $result['laravelSingleton2'] = app(AnotherConnection::class);
        $result['laravelSingleton3'] = new LaravelSingleton();

        $result['>>>  laravelSingleton1 === laravelSingleton2'] = $result['laravelSingleton1'] === $result['laravelSingleton2'];
        $result['>>>  laravelSingleton1 === laravelSingleton3'] = $result['laravelSingleton1'] === $result['laravelSingleton3'];
        //< Laravel-way способ создания Одиночки

        \Debugbar::info($result);

        return view('welcome', ['pattern' => __FUNCTION__]);
    }

    public function Multiton()
    {
//        $name = 'Пул одиночек (Multiton)';

        $multiton[] = SimpleMultiton::getInstance('mysql')->setTest('mysql-test');
        $multiton[] = SimpleMultiton::getInstance('mongo');

        $multiton[] = SimpleMultiton::getInstance('mysql');
        $multiton[] = SimpleMultiton::getInstance('mongo')->setTest('mongo-test');

        $simpleMultitonNext = SimpleMultitonNext::getInstance('mysql');
        $simpleMultitonNext->test2 = 'init';
        $multiton[] = $simpleMultitonNext;

        $simpleMultitonNext = SimpleMultitonNext::getInstance('mysql');
        $simpleMultitonNext->test2 = 'init2';
        $multiton[] = $simpleMultitonNext;

        \Debugbar::info($multiton);

        return view('welcome', ['pattern' => __FUNCTION__]);
    }

    public function Builder()
    {
//        $name = 'Строитель (Builder)';

        $builder = new BlogPostBuilder();

        $posts[] = $builder
            ->setTitle('from Builder')
            ->getBlogPost();

        $manager = new BlogPostManager();
        $manager->setBuilder($builder);

        $posts[] = $manager->createCleanPost();
        $posts[] = $manager->createNewPostIt();
        $posts[] = $manager->createNewPostCats();

        \Debugbar::info($posts);

        return view('welcome', ['pattern' => __FUNCTION__]);
    }

    public function LazyInitialization()
    {
        $lazyLoad = new LazyInitialization();

        $user[] = $lazyLoad->getUser()->name;
        $user[] = $lazyLoad->getUser()->email;
        $user[] = $lazyLoad->getUser()->created_at;

        \Debugbar::info($user);

        return view('welcome', ['pattern' => __FUNCTION__]);
    }

    public function Prototype() {
        $prototypeDemo = new PrototypeDemo();
        $result = $prototypeDemo->run();

        \Debugbar::info($result);

        return view('welcome', ['pattern' => __FUNCTION__]);
    }
}
