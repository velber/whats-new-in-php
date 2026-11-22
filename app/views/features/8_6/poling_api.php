<?php

/**
 * Poling API
 *
 * The new Io\Poll API efficiently monitors many streams at once using the best mechanism available
 * on each platform (epoll, kqueue, event ports, or WSAPoll), without the scalability limits of stream_select().
 * It is designed as a common foundation that event loop libraries such as ReactPHP and AMPHP can build on.
 *
 * I/O Polling or I/O Multiplexing, also known as asynchronous I/O,
 * is a technique used in computer programming to handle multiple input/output (I/O) operations simultaneously.
 * It allows a program to efficiently manage multiple I/O operations without blocking the execution of other tasks.
 *
 * This API provides a unified interface for monitoring I/O events across different platforms,
 * making it easier for developers to write efficient and scalable I/O code.
 *
 * It supports various I/O operations such as reading, writing, and polling,
 * and allows developers to register callbacks for each event.
 * The API also provides a non-blocking and event-driven approach, enabling efficient handling of multiple I/O operations.
 *
 * Common polling mechanisms include:
 *   - select() and poll() - Traditional POSIX mechanisms, work everywhere but have performance limitations
 *   - epoll (Linux) - High-performance, scalable to thousands of connections
 *   - kqueue (BSD/macOS) - High-performance, generalized event notification
 *   - event ports (Solaris/illumos) - High-performance kernel event delivery
 *   - WSAPoll (Windows) - Windows equivalent of poll()
 *
 * There are several interfaces Io\Poll in PHP fow working with I/O Polling
 *   - Context
 *   - Watcher
 *   - Handle
 *   - Backend Enum
 *   - Event Enum
 *   - IoException, PollException, FailedPollOperationException...
 */
echo '<hr><h2>Poling API</h2>';
