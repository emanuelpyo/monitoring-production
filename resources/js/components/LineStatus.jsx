function LineStatus({ lines }) {
    const statusClass = {
        RUNNING: 'bg-green-100 text-green-700',
        WARNING: 'bg-yellow-100 text-yellow-700',
        STOPPED: 'bg-red-100 text-red-700',
    };

    return (
        <section>
            <h2 className="mb-3 text-lg font-semibold text-gray-900">
                Production Line Status
            </h2>

            <div className="grid gap-4 md:grid-cols-3">
                {lines.map((line) => (
                    <div
                        key={line.id}
                        className="rounded-xl border border-gray-200 bg-white p-5 shadow-sm"
                    >
                        <div className="flex items-center justify-between">
                            <h3 className="font-semibold text-gray-900">
                                {line.code}
                            </h3>

                            <span
                                className={`rounded-full px-3 py-1 text-xs font-semibold ${
                                    statusClass[line.status]
                                }`}
                            >
                                {line.status}
                            </span>
                        </div>

                        <div className="mt-4 space-y-2 text-sm">
                            <p className="text-gray-600">
                                Product:{' '}
                                <span className="font-medium text-gray-900">
                                    {line.current_product?.name ?? 'No product'}
                                </span>
                            </p>

                            <p className="text-gray-600">
                                Last Activity:{' '}
                                <span className="font-medium text-gray-900">
                                    {line.last_activity_at ?? 'No activity'}
                                </span>
                            </p>
                        </div>
                    </div>
                ))}
            </div>
        </section>
    );
}

export default LineStatus;