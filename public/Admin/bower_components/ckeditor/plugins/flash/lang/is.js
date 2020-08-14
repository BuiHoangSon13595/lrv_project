
    }

    public function getApplicationPath(): ?string
    {
        return $this->applicationPath;
    }

    public function view(?View $view)
    {
        $this->view = $view;

        return $this;
    }

    public function addGlow(Glow $glow)
    {
        $this->glows[] = $glow->toArray();

        return $this;
    }

    public function addSolution(Solution $solution)
    {
        $this->solutions[] = ReportSolution::fromSolution($solution)->toArray();

        return $this;
    }

    public function userProvidedContext(array $userProvidedContext)
    {
        $this->userProvidedContext = $userProvidedContext;

        return $this;
    }

    public function groupByTopFrame()
    {
        $this->groupBy = GroupingTypes::TOP_FRAME;

        return $this;
    }

    public function groupByException()
    {
        $this->groupBy = GroupingTypes::EXCEPTION;

        return $this;
    }

    public function allContext(): array
    {
        $context = $this->context->toArray();

        $context = arr