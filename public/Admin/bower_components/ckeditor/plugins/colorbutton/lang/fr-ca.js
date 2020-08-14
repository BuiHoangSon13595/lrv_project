                  try {
                            $class = $parameter->getClass();
                            // @codeCoverageIgnoreStart
                        } catch (\ReflectionException $e) {
                            throw new RuntimeException(
                                \sprintf(
                                    'Cannot mock %s::%s() because a class or ' .
                                    'interface used in the signature is not loaded',
                                    $method->getDeclaringClass()->getName(),
                                    $method->getName()
                                ),
                                0,
                                $e
                            );
                        }
                        // @codeCoverageIgnoreEnd

                        if ($class !== null) {
                            $typeDeclaration = $class->getName() . ' ';
                        }
                    }
                }

                if (!$parameter->isVariadic()) {
                    if ($parameter->isDefaultValueAvailable()) {
                        try {
                            $value = \var_export($parameter->getDefaultValue(), true);
                            // @codeCoverageIgnoreStart
                        } catch (\ReflectionException $e) {
                            throw new Runti