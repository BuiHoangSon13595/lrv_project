ext']['exception']) && $record['context']['exception'] instanceof \Throwable) {
            $this->handleExceptionRecord($record);
        } else {
            $this->handleErrorRecord($record);
        }
    }

    private function handleDebugRecord(array $record): void
    {
        $tags = $this->getRecordTags($record);
        $message = $record['message'];
        if ($record['context']) {
            $message .= ' ' . Utils::jsonEncode($this->connector->getDumper()->dump(array_filter($record['context'])), null, true);
        }
        $this->connector->getDebugDispatcher()->dispatchDebug($message, $tags, $this->options['classesPartialsTraceIgnore']);
    }

    private function handleExceptionRecord(array $record): void
    {
        $this->connector->getErrorsDispatcher()->dispatchException($record['context']['exception']);
    }

    private function handleErrorRecord(array $record): void
    {
        $context = $record['context'];

        $this->connector->getErrorsDispatcher()->dispatchError(
   