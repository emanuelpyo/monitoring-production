function RejectAnalysis({ data }) {
    const totalRejects = data.reduce(
        (total, item) => total + Number(item.total),
        0,
    );

    return (
        <section className="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
            <div className="mb-4 flex items-center justify-between">
                <h2 className="text-lg font-semibold text-gray-900">
                    Reject Analysis
                </h2>

                <span className="text-sm font-medium text-red-600">
                    {totalRejects} rejects
                </span>
            </div>

            {data.length === 0 ? (
                <p className="text-sm text-gray-500">
                    No reject data yet.
                </p>
            ) : (
                <div className="space-y-4">
                    {data.map((item) => {
                        const percentage =
                            totalRejects > 0
                                ? (Number(item.total) / totalRejects) * 100
                                : 0;

                        return (
                            <div key={item.id}>
                                <div className="mb-1 flex justify-between text-sm">
                                    <span className="font-medium text-gray-700">
                                        {item.name}
                                    </span>

                                    <span className="text-gray-500">
                                        {item.total} ({percentage.toFixed(0)}%)
                                    </span>
                                </div>

                                <div className="h-2 overflow-hidden rounded-full bg-gray-100">
                                    <div
                                        className="h-full rounded-full bg-red-500"
                                        style={{
                                            width: `${percentage}%`,
                                        }}
                                    />
                                </div>
                            </div>
                        );
                    })}
                </div>
            )}
        </section>
    );
}

export default RejectAnalysis;